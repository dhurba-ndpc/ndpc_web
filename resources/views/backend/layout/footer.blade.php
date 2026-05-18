<footer class="sticky-footer backend-footer">
    <div class="container my-auto">
        <div class="backend-footer-inner">
            <div>
                <span class="backend-footer-title">NDPC Admin Panel</span>
                <span class="backend-footer-copy">&copy; 2024 - {{ date('Y') }} Nepal Digital Payment Company Ltd.</span>
            </div>
            <div class="backend-footer-meta">
                <span><i class="fas fa-lock"></i> Secure Dashboard</span>
                <span><i class="fas fa-calendar-alt"></i> {{ now()->format('M d, Y') }}</span>
            </div>
        </div>
    </div>
</footer>
