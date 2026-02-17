// Credit Simulator - Yamaha Installment Calculator
// Load installment tables from JSON and calculate credit packages

let installmentTables = {};

// Load installment tables from JSON file
async function loadInstallmentTables() {
    try {
        const response = await fetch('/data/installment-tables.json');
        installmentTables = await response.json();
        console.log('Installment tables loaded successfully');
        return true;
    } catch (error) {
        console.error('Error loading installment tables:', error);
        return false;
    }
}

function getInstallmentTable(motorPrice) {
    // Cari tabel yang exact match atau paling mendekati harga motor
    const priceStr = motorPrice.toString();
    
    // Cek exact match dulu
    if (installmentTables[priceStr]) {
        return installmentTables[priceStr];
    }
    
    // Jika tidak ada exact match, cari yang paling dekat
    const availablePrices = Object.keys(installmentTables);
    if (availablePrices.length === 0) {
        return null;
    }
    
    const priceKey = availablePrices.reduce((prev, curr) => {
        return Math.abs(parseInt(curr) - motorPrice) < Math.abs(parseInt(prev) - motorPrice) ? curr : prev;
    });
    
    return installmentTables[priceKey];
}

function findClosestDP(table, dpAmount) {
    // Cari DP yang paling mendekati dari tabel
    return table.reduce((prev, curr) => {
        return Math.abs(curr.dp - dpAmount) < Math.abs(prev.dp - dpAmount) ? curr : prev;
    });
}

function calculateInstallment(motorPrice, dp) {
    const table = getInstallmentTable(motorPrice);
    if (!table) {
        return null;
    }
    const closestEntry = findClosestDP(table, dp);
    return closestEntry;
}

function displayCreditPackages() {
    const motorPrice = parseInt(document.getElementById('motorPriceInput').value);
    const dpAmount = parseInt(document.getElementById('dpAmount').value) || 0;
    const packagesContainer = document.getElementById('creditPackages');
    
    // Check if tables are loaded
    if (Object.keys(installmentTables).length === 0) {
        packagesContainer.innerHTML = `
            <div class="col-12">
                <div class="alert alert-warning">
                    <i class="fas fa-spinner fa-spin me-2"></i>
                    Memuat data tabel angsuran...
                </div>
            </div>
        `;
        return;
    }
    
    // Validasi DP
    if (dpAmount < 0 || dpAmount > motorPrice) {
        packagesContainer.innerHTML = `
            <div class="col-12">
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Mohon masukkan DP yang valid (0 - ${formatRupiah(motorPrice)})
                </div>
            </div>
        `;
        document.getElementById('creditResult').style.display = 'none';
        return;
    }
    
    // Cek DP minimum
    const table = getInstallmentTable(motorPrice);
    
    if (!table) {
        packagesContainer.innerHTML = `
            <div class="col-12">
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Tabel angsuran untuk motor ini belum tersedia. Silakan hubungi dealer untuk informasi lebih lanjut.
                </div>
            </div>
        `;
        document.getElementById('creditResult').style.display = 'none';
        return;
    }
    
    const minDP = table[0].dp;
    
    if (dpAmount < minDP) {
        packagesContainer.innerHTML = `
            <div class="col-12">
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    DP minimum untuk motor ini adalah ${formatRupiah(minDP)}
                </div>
            </div>
        `;
        document.getElementById('creditResult').style.display = 'none';
        return;
    }
    
    // Dapatkan data angsuran berdasarkan DP
    const installmentData = calculateInstallment(motorPrice, dpAmount);
    const tenors = [11, 17, 23, 29, 35];
    
    packagesContainer.innerHTML = '';
    
    tenors.forEach((tenor) => {
        const installment = installmentData.installments[tenor];
        const totalPayment = (installment * tenor) + dpAmount;
        const totalInterest = totalPayment - motorPrice;
        const interestRate = 8.99; // Fixed rate 8.99%
        
        const packageCard = `
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="credit-package-card card h-100 p-3" 
                     onclick="selectPackage(${tenor}, ${installment}, ${totalPayment}, ${totalInterest})">
                    <div class="card-body text-center">
                        <div class="badge bg-primary mb-3">${tenor} Bulan</div>
                        <div class="installment-amount mb-2">
                            ${formatRupiah(installment)}
                        </div>
                        <small class="text-muted d-block mb-3">per bulan</small>
                        <hr>
                        <div class="small text-start">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Bunga:</span>
                                <strong>${interestRate}%</strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">Total Bayar:</span>
                                <strong class="text-primary">${formatRupiah(totalPayment)}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        packagesContainer.innerHTML += packageCard;
    });
    
    // Info DP yang digunakan
    if (installmentData.dp !== dpAmount) {
        const infoDiv = `
            <div class="col-12">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Perhitungan menggunakan DP terdekat: ${formatRupiah(installmentData.dp)}
                </div>
            </div>
        `;
        packagesContainer.innerHTML = infoDiv + packagesContainer.innerHTML;
    }
}

function selectPackage(tenor, monthly, total, interest) {
    document.getElementById('selectedTenor').textContent = tenor + ' Bulan';
    document.getElementById('monthlyPayment').textContent = formatRupiah(monthly);
    document.getElementById('totalPayment').textContent = formatRupiah(total);
    document.getElementById('totalInterest').textContent = formatRupiah(interest);
    document.getElementById('creditResult').style.display = 'block';
    
    // Highlight selected package
    document.querySelectorAll('.credit-package-card').forEach(card => {
        card.classList.remove('selected');
    });
    event.currentTarget.classList.add('selected');
    
    // Smooth scroll to result
    document.getElementById('creditResult').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

function formatRupiah(amount) {
    return 'Rp ' + Math.round(amount).toLocaleString('id-ID');
}

// Initialize credit simulator
document.addEventListener('DOMContentLoaded', function() {
    // Load installment tables
    loadInstallmentTables();
    
    // Event listener untuk perubahan DP
    const dpInput = document.getElementById('dpAmount');
    if (dpInput) {
        dpInput.addEventListener('input', function() {
            displayCreditPackages();
            document.getElementById('creditResult').style.display = 'none';
        });
    }
    
    // Tampilkan paket kredit saat modal dibuka
    const creditModal = document.getElementById('creditModal');
    if (creditModal) {
        creditModal.addEventListener('shown.bs.modal', function() {
            displayCreditPackages();
        });
    }
});
