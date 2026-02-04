# Routing Fixes Documentation

## Issues Fixed

### 1. Motor Detail Route Error
**Problem**: `Missing required parameter for [Route: motor.detail] [URI: motor/{motor}] [Missing parameter: motor]`

**Root Cause**: MotorDetailController masih menggunakan struktur database lama

**Solution**:
- Updated MotorDetailController to use new structure (Motor → MotorModel → MotorVariant)
- Fixed related motors query to fetch MotorModel instead of Motor
- Added support for model_id in credit calculation

### 2. Admin Variants Route Error
**Problem**: `Route [admin.motors.variants.index] not defined`

**Root Cause**: Route structure changed but some views still reference old routes

**Solution**:
- Added backward compatibility route: `admin.motors.variants.index` → redirects to `admin.motors.models.index`
- Updated MotorVariantController to use new parameter structure
- Fixed route parameter names in web.php

## Updated Route Structure

### Public Routes
```php
// Motor Detail
GET motor/{motor} → MotorDetailController@show
POST motor/{motor}/calculate-credit → MotorDetailController@calculateCredit
```

### Admin Routes
```php
// Motors (Basic Info)
GET admin/motors → MotorController@index
POST admin/motors → MotorController@store
GET admin/motors/create → MotorController@create
GET admin/motors/{motor} → MotorController@show
PUT admin/motors/{motor} → MotorController@update
DELETE admin/motors/{motor} → MotorController@destroy
GET admin/motors/{motor}/edit → MotorController@edit

// Motor Models
GET admin/motors/{motor}/models → MotorModelController@index
POST admin/motors/{motor}/models → MotorModelController@store
GET admin/motors/{motor}/models/create → MotorModelController@create
GET admin/motors/{motor}/models/{motorModel} → MotorModelController@show
PUT admin/motors/{motor}/models/{motorModel} → MotorModelController@update
DELETE admin/motors/{motor}/models/{motorModel} → MotorModelController@destroy
GET admin/motors/{motor}/models/{motorModel}/edit → MotorModelController@edit

// Motor Variants (Colors)
GET admin/motors/{motor}/models/{motorModel}/variants → MotorVariantController@index
POST admin/motors/{motor}/models/{motorModel}/variants → MotorVariantController@store
GET admin/motors/{motor}/models/{motorModel}/variants/create → MotorVariantController@create
PUT admin/motors/{motor}/models/{motorModel}/variants/{variant} → MotorVariantController@update
DELETE admin/motors/{motor}/models/{motorModel}/variants/{variant} → MotorVariantController@destroy
GET admin/motors/{motor}/models/{motorModel}/variants/{variant}/edit → MotorVariantController@edit

// Backward Compatibility
GET admin/motors/{motor}/variants → Redirects to admin/motors/{motor}/models
```

## Controller Updates

### 1. MotorDetailController
**Changes**:
- Load motor with models and variants using proper relationships
- Fetch related motors as MotorModel instances
- Support model_id parameter in credit calculation
- Use main_model for price calculation when no specific model selected

**New Methods**:
```php
public function show(Motor $motor)
{
    $motor->load(['models.variants', 'models' => function($query) {
        $query->where('is_active', true)->orderBy('price_otr', 'asc');
    }]);
    
    $relatedMotors = MotorModel::with(['motor', 'availableVariants'])
        ->whereHas('motor', function($query) use ($motor) {
            $query->where('category', $motor->category)
                  ->where('id', '!=', $motor->id);
        })
        ->where('is_active', true)
        ->take(4)
        ->get();

    return view('motor-detail', compact('motor', 'relatedMotors'));
}
```

### 2. MotorVariantController
**Changes**:
- Updated to use Motor, MotorModel, and MotorVariant parameters
- Changed motor_id to motor_model_id in data operations
- Updated redirect routes to use new structure
- Allow CSS gradients in color_code validation (max 255 chars)

**New Method Signatures**:
```php
public function index(Motor $motor, MotorModel $motorModel)
public function create(Motor $motor, MotorModel $motorModel)
public function store(Request $request, Motor $motor, MotorModel $motorModel)
public function edit(Motor $motor, MotorModel $motorModel, MotorVariant $variant)
public function update(Request $request, Motor $motor, MotorModel $motorModel, MotorVariant $variant)
public function destroy(Motor $motor, MotorModel $motorModel, MotorVariant $variant)
```

### 3. HomeController
**Changes**:
- Updated show method to match MotorDetailController
- Consistent data loading and related motors fetching

## Route Parameter Binding

### Model Binding
Laravel automatically resolves route parameters to model instances:

```php
// Route: admin/motors/{motor}/models/{motorModel}/variants/{variant}
// Parameters automatically bound to:
Motor $motor
MotorModel $motorModel  
MotorVariant $variant
```

### Parameter Names
- `{motor}` → Motor model instance
- `{motorModel}` → MotorModel model instance (changed from `{model}`)
- `{variant}` → MotorVariant model instance

## Backward Compatibility

### Legacy Route Support
Added redirect route for old admin structure:
```php
Route::get('motors/{motor}/variants', function($motorId) {
    $motor = \App\Models\Motor::findOrFail($motorId);
    return redirect()->route('admin.motors.models.index', $motor);
})->name('motors.variants.index');
```

This ensures old bookmarks and links still work.

## Testing Routes

### Verify Routes
```bash
php artisan route:list --name=motor
```

### Test URLs
- Public: `http://localhost:8000/motor/1`
- Admin Motors: `http://localhost:8000/admin/motors`
- Admin Models: `http://localhost:8000/admin/motors/1/models`
- Admin Variants: `http://localhost:8000/admin/motors/1/models/1/variants`

## Error Handling

### Common Issues
1. **Missing Parameter**: Ensure all route parameters are provided
2. **Model Not Found**: Check if IDs exist in database
3. **Route Not Defined**: Verify route names match exactly

### Debug Commands
```bash
# List all routes
php artisan route:list

# Clear route cache
php artisan route:clear

# Check specific route
php artisan route:list --name=motor.detail
```

## Benefits

### 1. Proper Structure
- Routes now reflect actual data hierarchy
- Clear separation between Motor, Model, and Variant management

### 2. Consistency
- All controllers use same parameter structure
- Consistent naming conventions

### 3. Maintainability
- Easy to understand route structure
- Clear controller responsibilities
- Proper model binding

### 4. Backward Compatibility
- Old routes redirect to new structure
- No broken links for existing users

The routing system now properly supports the three-tier structure (Motor → Model → Variant) while maintaining backward compatibility and providing clear, RESTful URLs for all admin operations.