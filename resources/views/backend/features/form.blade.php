@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">{{ isset($data) ? 'Edit Feature' : 'Create Feature' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('features.index') }}">Features</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ isset($data) ? 'Edit Feature' : 'Create Feature' }}</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('features.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-list fa-sm text-white-50 mr-2"></i> View List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-star mr-2"></i>Feature Information
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ isset($data) ? route('features.update', $data->id) : route('features.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($data))
                            @method('PUT')
                        @endif
                        <input type="hidden" name="type" value="features_offer">

                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <div class="card border-left-primary shadow h-100">
                                    <div class="card-header bg-light">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">
                                                <i class="fas fa-icons mr-1"></i> Feature Icon
                                            </h6>
                                            <span class="badge badge-primary badge-pill">Bootstrap</span>
                                        </div>
                                    </div>
                                    @php
                                        $icons = [
                                            // Existing
                                            'bi bi-house',
                                            'bi bi-globe',
                                            'bi bi-people',
                                            'bi bi-stars',
                                            'bi bi-wallet2',
                                            'bi bi-shield-check',
                                            'bi bi-graph-up',
                                            'bi bi-phone',
                                            'bi bi-credit-card-2-front',
                                            'bi bi-ticket-perforated',
                                            'bi bi-qr-code-scan',
                                            'bi bi-stars',

                                            // Fast Registration
                                            'bi bi-person-plus',
                                            'bi bi-person-check',
                                            'bi bi-box-arrow-in-right',

                                            // Easy Transaction
                                            'bi bi-arrow-left-right',
                                            'bi bi-cash-stack',
                                            'bi bi-bank',

                                            // QR Code Payment
                                            'bi bi-qr-code',
                                            'bi bi-upc-scan',
                                            'bi bi-credit-card',

                                            // Secure and Reliable
                                            'bi bi-shield-lock',
                                            'bi bi-patch-check',
                                            'bi bi-lock',

                                            // Top-up
                                            'bi bi-wallet',
                                            'bi bi-currency-exchange',
                                            'bi bi-plus-circle',

                                            // Utility Bill Payments
                                            'bi bi-receipt',
                                            'bi bi-lightning-charge',
                                            'bi bi-file-earmark-text',

                                            // Ticket Booking
                                            'bi bi-ticket-detailed',
                                            'bi bi-calendar-event',
                                            'bi bi-airplane',

                                            // Merchant Payment
                                            'bi bi-shop',
                                            'bi bi-bag-check',
                                            'bi bi-cart-check',

                                            // Reward Points
                                            'bi bi-gift',
                                            'bi bi-trophy',
                                            'bi bi-award',

                                            // Fund Transfer
                                            'bi bi-send',
                                            'bi bi-arrow-repeat',
                                            'bi bi-arrow-up-right-circle',
                                        ];
                                    @endphp
                                    <div class="card-body">
                                        <div class="rounded bg-light border d-flex align-items-center justify-content-center mb-3"
                                            style="min-height: 170px;">
                                            <div class="bg-white border rounded-circle shadow-sm d-flex align-items-center justify-content-center text-primary"
                                                style="width: 112px; height: 112px;">
                                                <i id="featureIconPreview"
                                                    class="{{ old('bootstrap_icon', $data->bootstrap_icon ?? 'bi bi-stars') }}"
                                                    style="font-size: 54px;"></i>
                                            </div>
                                        </div>

                                        <div class="border rounded bg-white p-3 mb-3">
                                            <div class="small font-weight-bold text-gray-700 mb-2">Quick pick</div>
                                            <div class="row no-gutters">
                                                @foreach ($icons as $icon)
                                                    <div class="col-2 p-1">
                                                        <button type="button"
                                                            class="btn btn-light border btn-block icon-picker"
                                                            data-icon="{{ $icon }}" title="{{ $icon }}"
                                                            style="height: 42px;">
                                                            <i class="{{ $icon }}"></i>
                                                        </button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="form-group mb-0">
                                            <label for="bootstrap_icon" class="form-label">
                                                <i class="fas fa-code text-primary"></i> Bootstrap Icon Class
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-white text-primary">
                                                        <i class="fas fa-terminal"></i>
                                                    </span>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('bootstrap_icon') is-invalid @enderror"
                                                    id="bootstrap_icon" name="bootstrap_icon"
                                                    value="{{ old('bootstrap_icon', $data->bootstrap_icon ?? '') }}"
                                                    placeholder="bi bi-shield-check"
                                                    oninput="previewFeatureIcon(this.value)">
                                                @error('bootstrap_icon')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <small class="text-muted d-block mt-2">
                                                Browse more at
                                                <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener">
                                                    Bootstrap Icons
                                                </a>.
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <ul class="nav nav-tabs nav-fill mb-4" id="featureLanguageTabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active {{ $errors->has('title_en') || $errors->has('description_en') ? 'text-danger font-weight-bold' : '' }}"
                                            id="english-tab" data-toggle="tab" href="#english" role="tab"
                                            aria-controls="english" aria-selected="true">
                                            <i class="fas fa-language mr-1"></i> English
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $errors->has('title_ne') || $errors->has('description_ne') ? 'text-danger font-weight-bold' : '' }}"
                                            id="nepali-tab" data-toggle="tab" href="#nepali" role="tab"
                                            aria-controls="nepali" aria-selected="false">
                                            <i class="fas fa-language mr-1"></i> Nepali
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="featureLanguageTabsContent">
                                    <div class="tab-pane fade show active" id="english" role="tabpanel"
                                        aria-labelledby="english-tab">
                                        <div class="card border-left-success">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <label for="title_en" class="form-label">
                                                        <i class="fas fa-heading text-success"></i> Feature Title
                                                    </label>
                                                    <input type="text"
                                                        class="form-control @error('title_en') is-invalid @enderror"
                                                        id="title_en" name="title_en"
                                                        value="{{ old('title_en', $data->title_en ?? '') }}"
                                                        placeholder="Enter English feature title">
                                                    @error('title_en')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="description_en" class="form-label">
                                                        <i class="fas fa-align-left text-success"></i> Description
                                                    </label>
                                                    <textarea class="form-control @error('description_en') is-invalid @enderror" id="description_en"
                                                        name="description_en" rows="6" placeholder="Enter English description">{{ old('description_en', $data->description_en ?? '') }}</textarea>
                                                    @error('description_en')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="nepali" role="tabpanel"
                                        aria-labelledby="nepali-tab">
                                        <div class="card border-left-warning">
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <label for="title_ne" class="form-label">
                                                        <i class="fas fa-heading text-warning"></i> Feature Title
                                                    </label>
                                                    <input type="text"
                                                        class="form-control @error('title_ne') is-invalid @enderror"
                                                        id="title_ne" name="title_ne"
                                                        value="{{ old('title_ne', $data->title_ne ?? '') }}"
                                                        placeholder="Enter Nepali feature title">
                                                    @error('title_ne')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="description_ne" class="form-label">
                                                        <i class="fas fa-align-left text-warning"></i> Description
                                                    </label>
                                                    <textarea class="form-control @error('description_ne') is-invalid @enderror" id="description_ne"
                                                        name="description_ne" rows="6" placeholder="Enter Nepali description">{{ old('description_ne', $data->description_ne ?? '') }}</textarea>
                                                    @error('description_ne')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="position" class="form-label">
                                                <i class="fas fa-sort-numeric-down text-info"></i> Position
                                            </label>
                                            <input type="number" min="0"
                                                class="form-control @error('position') is-invalid @enderror"
                                                id="position" name="position"
                                                value="{{ old('position', $data->position ?? 0) }}"
                                                placeholder="Enter display position">
                                            @error('position')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <div class="custom-control custom-switch custom-control-lg mt-md-4 pt-md-2">
                                                <input type="checkbox" class="custom-control-input" id="is_active"
                                                    name="is_active" value="1"
                                                    {{ old('is_active', $data->is_active ?? true) ? 'checked' : '' }}>
                                                <label class="custom-control-label font-weight-bold" for="is_active">
                                                    Publish Status
                                                </label>
                                                <p class="small text-muted">Toggle to make this feature visible on the
                                                    website.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-save"></i>
                                </span>
                                <span class="text">{{ isset($data) ? 'Update Feature' : 'Save Feature' }}</span>
                            </button>
                            <a href="{{ route('features.index') }}"
                                class="btn btn-secondary btn-icon-split shadow-sm ml-2">
                                <span class="icon text-white-50">
                                    <i class="fas fa-times"></i>
                                </span>
                                <span class="text">Cancel</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function previewFeatureIcon(iconClass) {
            const preview = document.getElementById('featureIconPreview');
            preview.className = iconClass || 'bi bi-stars';
        }
    </script>
    <script>
        document.querySelectorAll('.icon-picker').forEach(icon => {

            icon.addEventListener('click', function() {

                const iconClass = this.dataset.icon;

                document.getElementById('bootstrap_icon').value = iconClass;
                previewFeatureIcon(iconClass);

                document.querySelectorAll('.icon-picker').forEach(item => {
                    item.classList.remove('border-primary', 'text-primary');
                });

                this.classList.add('border-primary', 'text-primary');

            });

        });
    </script>
@endpush

