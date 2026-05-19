@extends('backend.layout.main')

@section('content')
    @php
        $user = auth()->user();
        $hasSetting = isset($data) && $data;
        $siteSettingTabs = [
            [
                'key' => 'site-settings',
                'permission' => 'SiteSetting-View',
                'tabId' => 'page-one-tab',
                'panelId' => 'page-one-panel',
                'icon' => 'fas fa-file-alt',
                'title' => 'Site Settings',
                'subtitle' => 'Update general detail',
            ],
            [
                'key' => 'dark-banner',
                'permission' => 'DarkBanner-View',
                'tabId' => 'page-two-tab',
                'panelId' => 'page-two-panel',
                'icon' => 'fas fa-file-alt',
                'title' => 'Dark Banner',
                'subtitle' => 'update banner detail',
            ],
            [
                'key' => 'namaste-pay-app',
                'permission' => 'PlayStore-View',
                'tabId' => 'page-three-tab',
                'panelId' => 'page-three-panel',
                'icon' => 'fas fa-file-alt',
                'title' => 'Namaste Pay App',
                'subtitle' => 'Update Namaste Pay App link detail',
            ],
            [
                'key' => 'digital-wallet',
                'permission' => 'PromotionMessage-View',
                'tabId' => 'page-four-tab',
                'panelId' => 'page-four-panel',
                'icon' => 'fas fa-file-alt',
                'title' => 'Digital Wallet',
                'subtitle' => 'Digital Wallet Redefined',
            ],
            [
                'key' => 'company-goal',
                'permission' => 'CompanyGoal-View',
                'tabId' => 'company-goal-tab',
                'panelId' => 'company-goal-panel',
                'icon' => 'fas fa-bullseye',
                'title' => 'Company Goal',
                'subtitle' => 'Goal Section',
            ],
        ];
        $visibleSiteSettingTabs = collect($siteSettingTabs)->filter(fn($tab) => $user && $user->can($tab['permission']))->values();
        $firstVisibleSiteSettingTab = $visibleSiteSettingTabs->first();
    @endphp

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">Site Settings</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Site Settings</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-sliders-h mr-2"></i>Global Website Configuration
                    </h6>
                </div>

                <div class="card-body site-setting-tab-shell" style="visibility: hidden;">
                    <div class="row">
                        <div class="col-lg-3 mb-4 mb-lg-0">
                            <div class="nav flex-column nav-pills site-setting-tabs" id="siteSettingMainTabs" role="tablist"
                                aria-orientation="vertical">
                                @foreach ($siteSettingTabs as $tab)
                                    @can($tab['permission'])
                                        <a class="nav-link {{ $firstVisibleSiteSettingTab['key'] === $tab['key'] ? 'active' : '' }}"
                                            id="{{ $tab['tabId'] }}" data-toggle="pill" href="#{{ $tab['panelId'] }}"
                                            role="tab" aria-controls="{{ $tab['panelId'] }}"
                                            aria-selected="{{ $firstVisibleSiteSettingTab['key'] === $tab['key'] ? 'true' : 'false' }}">
                                            <span class="site-tab-title"><i class="{{ $tab['icon'] }} mr-2"></i>{{ $tab['title'] }}</span>
                                            <span class="site-tab-subtitle">{{ $tab['subtitle'] }}</span>
                                        </a>
                                    @endcan
                                @endforeach
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="tab-content" id="siteSettingMainTabsContent">
                                @can('SiteSetting-View')
                                <div class="tab-pane fade {{ $firstVisibleSiteSettingTab['key'] === 'site-settings' ? 'show active' : '' }}" id="page-one-panel" role="tabpanel"
                                    aria-labelledby="page-one-tab">
                                    <form action="{{ $hasSetting ? route('siteSetting.update', $data->id) : route('siteSetting.store') }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if ($hasSetting)
                                            @method('PUT')
                                        @endif
                                        @php
                                            $siteSettingPublishPermission = isset($data) ? 'SiteSetting-Edit' : 'SiteSetting-Create';
                                            $canModifySiteSettingPublish = $user && $user->can($siteSettingPublishPermission);
                                        @endphp

                                        <ul class="nav nav-tabs nav-fill mb-4 site-setting-sub-tabs" id="pageOneSettingTabs"
                                            role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="brand-tab" data-toggle="tab" href="#brand-panel"
                                                    role="tab" aria-controls="brand-panel" aria-selected="true">
                                                    <i class="fas fa-certificate mr-1"></i> Brand & Status
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-panel"
                                                    role="tab" aria-controls="contact-panel" aria-selected="false">
                                                    <i class="fas fa-address-book mr-1"></i> Contact Details
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="location-tab" data-toggle="tab" href="#location-panel"
                                                    role="tab" aria-controls="location-panel" aria-selected="false">
                                                    <i class="fas fa-map-marker-alt mr-1"></i> Location & Map
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="social-tab" data-toggle="tab" href="#social-panel"
                                                    role="tab" aria-controls="social-panel" aria-selected="false">
                                                    <i class="fas fa-share-alt mr-1"></i> Social Channels
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="officer-tab" data-toggle="tab" href="#officer-panel"
                                                    role="tab" aria-controls="officer-panel" aria-selected="false">
                                                    <i class="fas fa-user-tie mr-1"></i> Information Officer
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="footer-tab" data-toggle="tab" href="#footer-panel"
                                                    role="tab" aria-controls="footer-panel" aria-selected="false">
                                                    <i class="fas fa-align-left mr-1"></i> Footer Content
                                                </a>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="pageOneSettingTabsContent">
                                            <div class="tab-pane fade show active" id="brand-panel" role="tabpanel"
                                                aria-labelledby="brand-tab">
                                                <div class="card border-left-primary">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-4">
                                                                <label class="font-weight-bold text-dark d-block">Primary Logo</label>
                                                                <div class="site-logo-preview border rounded bg-light d-flex align-items-center justify-content-center mb-3">
                                                                    <img id="logo1Preview"
                                                                        src="{{ $hasSetting && $data->logo_1 ? asset('storage/' . $data->logo_1) : asset('backend/img/placeholder.jpg') }}"
                                                                        alt="Primary logo preview"
                                                                        class="img-fluid rounded"
                                                                        style="{{ $hasSetting && $data->logo_1 ? '' : 'opacity: .55;' }}">
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="logo_1" id="logo_1"
                                                                        class="custom-file-input @error('logo_1') is-invalid @enderror"
                                                                        accept="image/*"
                                                                        onchange="previewSiteLogo(event, 'logo1Preview')">
                                                                    <label class="custom-file-label" for="logo_1">Choose primary logo...</label>
                                                                    @error('logo_1')
                                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                                    @enderror
                                                                </div>
                                                                <small class="text-muted d-block mt-2">Recommended example: transparent PNG or SVG logo for header use.</small>
                                                            </div>

                                                            <div class="col-md-6 mb-4">
                                                                <label class="font-weight-bold text-dark d-block">Secondary Logo</label>
                                                                <div class="site-logo-preview border rounded bg-light d-flex align-items-center justify-content-center mb-3">
                                                                    <img id="logo2Preview"
                                                                        src="{{ $hasSetting && $data->logo_2 ? asset('storage/' . $data->logo_2) : asset('backend/img/placeholder.jpg') }}"
                                                                        alt="Secondary logo preview"
                                                                        class="img-fluid rounded"
                                                                        style="{{ $hasSetting && $data->logo_2 ? '' : 'opacity: .55;' }}">
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="logo_2" id="logo_2"
                                                                        class="custom-file-input @error('logo_2') is-invalid @enderror"
                                                                        accept="image/*"
                                                                        onchange="previewSiteLogo(event, 'logo2Preview')">
                                                                    <label class="custom-file-label" for="logo_2">Choose secondary logo...</label>
                                                                    @error('logo_2')
                                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                                    @enderror
                                                                </div>
                                                                <small class="text-muted d-block mt-2">Recommended example: partner, footer, or alternate brand logo.</small>
                                                            </div>
                                                        </div>

                                                        <div class="custom-control custom-switch custom-control-lg">
                                                            <input type="checkbox" class="custom-control-input" id="is_active"
                                                                name="is_active" value="1"
                                                                {{ $canModifySiteSettingPublish ? '' : 'disabled' }}
                                                                {{ old('is_active', $hasSetting ? $data->is_active : true) ? 'checked' : '' }}>
                                                            <label class="custom-control-label font-weight-bold" for="is_active">
                                                                Publish Site Settings
                                                            </label>
                                                            <p class="small text-muted mb-0">Turn on to use these settings across the front-end website.</p>
                                                            @unless ($canModifySiteSettingPublish)
                                                                <small class="text-danger d-block mt-2">You do not have permission to modify this field.</small>
                                                            @endunless
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="contact-panel" role="tabpanel"
                                                aria-labelledby="contact-tab">
                                                <div class="card border-left-success">
                                                    <div class="card-body">
                                                        <ul class="nav nav-tabs nav-fill mb-4" id="contactLanguageTabs" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active {{ $errors->has('address_en') ? 'text-danger font-weight-bold' : '' }}"
                                                                    id="contact-english-tab" data-toggle="tab" href="#contact-english"
                                                                    role="tab" aria-controls="contact-english" aria-selected="true">
                                                                    <i class="fas fa-language mr-1"></i> English
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $errors->has('address_ne') ? 'text-danger font-weight-bold' : '' }}"
                                                                    id="contact-nepali-tab" data-toggle="tab" href="#contact-nepali"
                                                                    role="tab" aria-controls="contact-nepali" aria-selected="false">
                                                                    <i class="fas fa-language mr-1"></i> Nepali
                                                                </a>
                                                            </li>
                                                        </ul>

                                                        <div class="tab-content mb-4" id="contactLanguageTabsContent">
                                                            <div class="tab-pane fade show active" id="contact-english" role="tabpanel"
                                                                aria-labelledby="contact-english-tab">
                                                                <div class="form-group">
                                                                    <label for="address_en" class="font-weight-bold text-dark">Office Address</label>
                                                                    <input type="text" class="form-control @error('address_en') is-invalid @enderror"
                                                                        id="address_en" name="address_en"
                                                                        value="{{ old('address_en', $data->address_en ?? '') }}"
                                                                        placeholder="e.g., Singha Durbar, Kathmandu, Nepal">
                                                                    @error('address_en')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="contact-nepali" role="tabpanel"
                                                                aria-labelledby="contact-nepali-tab">
                                                                <div class="form-group">
                                                                    <label for="address_ne" class="font-weight-bold text-dark">Office Address</label>
                                                                    <input type="text" class="form-control @error('address_ne') is-invalid @enderror"
                                                                        id="address_ne" name="address_ne"
                                                                        value="{{ old('address_ne', $data->address_ne ?? '') }}"
                                                                        placeholder="जस्तै, सिंहदरबार, काठमाडौं, नेपाल">
                                                                    @error('address_ne')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="phone_1" class="font-weight-bold text-dark">Primary Landline</label>
                                                                    <input type="text" class="form-control @error('phone_1') is-invalid @enderror"
                                                                        id="phone_1" name="phone_1"
                                                                        value="{{ old('phone_1', $data->phone_1 ?? '') }}"
                                                                        placeholder="e.g., 01-4200000">
                                                                    @error('phone_1')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="phone_2" class="font-weight-bold text-dark">Secondary Landline</label>
                                                                    <input type="text" class="form-control @error('phone_2') is-invalid @enderror"
                                                                        id="phone_2" name="phone_2"
                                                                        value="{{ old('phone_2', $data->phone_2 ?? '') }}"
                                                                        placeholder="e.g., 01-4200001">
                                                                    @error('phone_2')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="mobile_no_1" class="font-weight-bold text-dark">Primary Mobile Number</label>
                                                                    <input type="text" class="form-control @error('mobile_no_1') is-invalid @enderror"
                                                                        id="mobile_no_1" name="mobile_no_1"
                                                                        value="{{ old('mobile_no_1', $data->mobile_no_1 ?? '') }}"
                                                                        placeholder="e.g., +977-9841000000">
                                                                    @error('mobile_no_1')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="mobile_no_2" class="font-weight-bold text-dark">Secondary Mobile Number</label>
                                                                    <input type="text" class="form-control @error('mobile_no_2') is-invalid @enderror"
                                                                        id="mobile_no_2" name="mobile_no_2"
                                                                        value="{{ old('mobile_no_2', $data->mobile_no_2 ?? '') }}"
                                                                        placeholder="e.g., +977-9851000000">
                                                                    @error('mobile_no_2')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group mb-md-0">
                                                                    <label for="email" class="font-weight-bold text-dark">Official Email Address</label>
                                                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                                        id="email" name="email"
                                                                        value="{{ old('email', $data->email ?? '') }}"
                                                                        placeholder="e.g., info@example.gov.np">
                                                                    @error('email')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-0">
                                                                    <label for="zipcode" class="font-weight-bold text-dark">Postal / Zip Code</label>
                                                                    <input type="text" class="form-control @error('zipcode') is-invalid @enderror"
                                                                        id="zipcode" name="zipcode"
                                                                        value="{{ old('zipcode', $data->zipcode ?? '') }}"
                                                                        placeholder="e.g., 44600">
                                                                    @error('zipcode')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="location-panel" role="tabpanel"
                                                aria-labelledby="location-tab">
                                                <div class="card border-left-info">
                                                    <div class="card-body">
                                                        <div class="form-group mb-0">
                                                            <label for="google_map" class="font-weight-bold text-dark">Google Map Embed Code</label>
                                                            <textarea class="form-control @error('google_map') is-invalid @enderror"
                                                                id="google_map" name="google_map" rows="8"
                                                                placeholder="e.g., Paste the Google Maps iframe embed code for your office location">{{ old('google_map', $data->google_map ?? '') }}</textarea>
                                                            @error('google_map')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            <small class="text-muted d-block mt-2">Use the embed iframe from Google Maps so the front-end can display the office location.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="social-panel" role="tabpanel"
                                                aria-labelledby="social-tab">
                                                <div class="card border-left-warning">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="facebook_link" class="font-weight-bold text-dark">Facebook Page URL</label>
                                                                    <input type="url" class="form-control @error('facebook_link') is-invalid @enderror"
                                                                        id="facebook_link" name="facebook_link"
                                                                        value="{{ old('facebook_link', $data->facebook_link ?? '') }}"
                                                                        placeholder="e.g., https://www.facebook.com/your-page">
                                                                    @error('facebook_link')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="instagram_link" class="font-weight-bold text-dark">Instagram Profile URL</label>
                                                                    <input type="url" class="form-control @error('instagram_link') is-invalid @enderror"
                                                                        id="instagram_link" name="instagram_link"
                                                                        value="{{ old('instagram_link', $data->instagram_link ?? '') }}"
                                                                        placeholder="e.g., https://www.instagram.com/your-profile">
                                                                    @error('instagram_link')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-md-0">
                                                                    <label for="linkedin_link" class="font-weight-bold text-dark">LinkedIn Page URL</label>
                                                                    <input type="url" class="form-control @error('linkedin_link') is-invalid @enderror"
                                                                        id="linkedin_link" name="linkedin_link"
                                                                        value="{{ old('linkedin_link', $data->linkedin_link ?? '') }}"
                                                                        placeholder="e.g., https://www.linkedin.com/company/your-company">
                                                                    @error('linkedin_link')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-0">
                                                                    <label for="youtube_link" class="font-weight-bold text-dark">YouTube Channel URL</label>
                                                                    <input type="url" class="form-control @error('youtube_link') is-invalid @enderror"
                                                                        id="youtube_link" name="youtube_link"
                                                                        value="{{ old('youtube_link', $data->youtube_link ?? '') }}"
                                                                        placeholder="e.g., https://www.youtube.com/@your-channel">
                                                                    @error('youtube_link')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="officer-panel" role="tabpanel"
                                                aria-labelledby="officer-tab">
                                                <div class="card border-left-secondary">
                                                    <div class="card-body">
                                                        <ul class="nav nav-tabs nav-fill mb-4" id="officerLanguageTabs" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active {{ $errors->has('information_officer_name_en') ? 'text-danger font-weight-bold' : '' }}"
                                                                    id="officer-english-tab" data-toggle="tab" href="#officer-english"
                                                                    role="tab" aria-controls="officer-english" aria-selected="true">
                                                                    <i class="fas fa-language mr-1"></i> English
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $errors->has('information_officer_name_ne') ? 'text-danger font-weight-bold' : '' }}"
                                                                    id="officer-nepali-tab" data-toggle="tab" href="#officer-nepali"
                                                                    role="tab" aria-controls="officer-nepali" aria-selected="false">
                                                                    <i class="fas fa-language mr-1"></i> Nepali
                                                                </a>
                                                            </li>
                                                        </ul>

                                                        <div class="tab-content mb-4" id="officerLanguageTabsContent">
                                                            <div class="tab-pane fade show active" id="officer-english" role="tabpanel"
                                                                aria-labelledby="officer-english-tab">
                                                                <div class="form-group">
                                                                    <label for="information_officer_name_en" class="font-weight-bold text-dark">Officer Name</label>
                                                                    <input type="text" class="form-control @error('information_officer_name_en') is-invalid @enderror"
                                                                        id="information_officer_name_en" name="information_officer_name_en"
                                                                        value="{{ old('information_officer_name_en', $data->information_officer_name_en ?? '') }}"
                                                                        placeholder="e.g., Rajesh Sharma">
                                                                    @error('information_officer_name_en')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="officer-nepali" role="tabpanel"
                                                                aria-labelledby="officer-nepali-tab">
                                                                <div class="form-group">
                                                                    <label for="information_officer_name_ne" class="font-weight-bold text-dark">Officer Name</label>
                                                                    <input type="text" class="form-control @error('information_officer_name_ne') is-invalid @enderror"
                                                                        id="information_officer_name_ne" name="information_officer_name_ne"
                                                                        value="{{ old('information_officer_name_ne', $data->information_officer_name_ne ?? '') }}"
                                                                        placeholder="जस्तै, राजेश शर्मा">
                                                                    @error('information_officer_name_ne')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-md-0">
                                                                    <label for="information_officer_contact_no" class="font-weight-bold text-dark">Officer Contact Number</label>
                                                                    <input type="text" class="form-control @error('information_officer_contact_no') is-invalid @enderror"
                                                                        id="information_officer_contact_no" name="information_officer_contact_no"
                                                                        value="{{ old('information_officer_contact_no', $data->information_officer_contact_no ?? '') }}"
                                                                        placeholder="e.g., +977-9841000000">
                                                                    @error('information_officer_contact_no')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-0">
                                                                    <label for="information_officer_email" class="font-weight-bold text-dark">Officer Email Address</label>
                                                                    <input type="email" class="form-control @error('information_officer_email') is-invalid @enderror"
                                                                        id="information_officer_email" name="information_officer_email"
                                                                        value="{{ old('information_officer_email', $data->information_officer_email ?? '') }}"
                                                                        placeholder="e.g., officer@example.gov.np">
                                                                    @error('information_officer_email')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="footer-panel" role="tabpanel"
                                                aria-labelledby="footer-tab">
                                                <div class="card border-left-dark">
                                                    <div class="card-body">
                                                        <ul class="nav nav-tabs nav-fill mb-4" id="footerLanguageTabs" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active {{ $errors->has('connect_short_message_en') || $errors->has('footer_short_description_en') ? 'text-danger font-weight-bold' : '' }}"
                                                                    id="footer-english-tab" data-toggle="tab" href="#footer-english"
                                                                    role="tab" aria-controls="footer-english" aria-selected="true">
                                                                    <i class="fas fa-language mr-1"></i> English
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $errors->has('connect_short_message_ne') || $errors->has('footer_short_description_ne') ? 'text-danger font-weight-bold' : '' }}"
                                                                    id="footer-nepali-tab" data-toggle="tab" href="#footer-nepali"
                                                                    role="tab" aria-controls="footer-nepali" aria-selected="false">
                                                                    <i class="fas fa-language mr-1"></i> Nepali
                                                                </a>
                                                            </li>
                                                        </ul>

                                                        <div class="tab-content" id="footerLanguageTabsContent">
                                                            <div class="tab-pane fade show active" id="footer-english" role="tabpanel"
                                                                aria-labelledby="footer-english-tab">
                                                                <div class="form-group">
                                                                    <label for="connect_short_message_en" class="font-weight-bold text-dark">Contact Invitation Message</label>
                                                                    <textarea class="form-control @error('connect_short_message_en') is-invalid @enderror"
                                                                        id="connect_short_message_en" name="connect_short_message_en" rows="4"
                                                                        placeholder="e.g., Connect with us for official updates, services, and public information.">{{ old('connect_short_message_en', $data->connect_short_message_en ?? '') }}</textarea>
                                                                    @error('connect_short_message_en')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group mb-0">
                                                                    <label for="footer_short_description_en" class="font-weight-bold text-dark">Footer Short Description</label>
                                                                    <textarea class="form-control @error('footer_short_description_en') is-invalid @enderror"
                                                                        id="footer_short_description_en" name="footer_short_description_en" rows="4"
                                                                        placeholder="e.g., A concise overview of the organization shown in the website footer.">{{ old('footer_short_description_en', $data->footer_short_description_en ?? '') }}</textarea>
                                                                    @error('footer_short_description_en')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane fade" id="footer-nepali" role="tabpanel"
                                                                aria-labelledby="footer-nepali-tab">
                                                                <div class="form-group">
                                                                    <label for="connect_short_message_ne" class="font-weight-bold text-dark">Contact Invitation Message</label>
                                                                    <textarea class="form-control @error('connect_short_message_ne') is-invalid @enderror"
                                                                        id="connect_short_message_ne" name="connect_short_message_ne" rows="4"
                                                                        placeholder="जस्तै, आधिकारिक सूचना, सेवा र जानकारीका लागि हामीसँग जोडिनुहोस्।">{{ old('connect_short_message_ne', $data->connect_short_message_ne ?? '') }}</textarea>
                                                                    @error('connect_short_message_ne')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group mb-0">
                                                                    <label for="footer_short_description_ne" class="font-weight-bold text-dark">Footer Short Description</label>
                                                                    <textarea class="form-control @error('footer_short_description_ne') is-invalid @enderror"
                                                                        id="footer_short_description_ne" name="footer_short_description_ne" rows="4"
                                                                        placeholder="जस्तै, वेबसाइट फुटरमा देखिने संस्थाको छोटो परिचय।">{{ old('footer_short_description_ne', $data->footer_short_description_ne ?? '') }}</textarea>
                                                                    @error('footer_short_description_ne')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="form-actions">
                                            @if ($hasSetting)
                                                @can('SiteSetting-Edit')
                                                    <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-save"></i>
                                                        </span>
                                                        <span class="text">Update Site Settings</span>
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-danger btn-icon-split shadow-sm" disabled>
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-ban"></i>
                                                        </span>
                                                        <span class="text">No Update Permission</span>
                                                    </button>
                                                @endcan
                                            @else
                                                @can('SiteSetting-Create')
                                                    <button type="submit" class="btn btn-success btn-icon-split shadow-sm">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-save"></i>
                                                        </span>
                                                        <span class="text">Save Site Settings</span>
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-danger btn-icon-split shadow-sm" disabled>
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-ban"></i>
                                                        </span>
                                                        <span class="text">No Create Permission</span>
                                                    </button>
                                                @endcan
                                            @endif
                                            <a href="{{ route('dashboard.index') }}" class="btn btn-secondary btn-icon-split shadow-sm ml-2">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-times"></i>
                                                </span>
                                                <span class="text">Cancel</span>
                                            </a>
                                        </div>
                                    </form>
                                </div>
                                @endcan

                                @can('DarkBanner-View')
                                <div class="tab-pane fade {{ $firstVisibleSiteSettingTab['key'] === 'dark-banner' ? 'show active' : '' }}" id="page-two-panel" role="tabpanel" aria-labelledby="page-two-tab">
                                    @php
                                        $hasDarkBanner = isset($darkBanner) && $darkBanner;
                                        $hasDarkBannerImage = $hasDarkBanner && $darkBanner->image;
                                        $darkBannerPublishPermission = $hasDarkBanner ? 'DarkBanner-Edit' : 'DarkBanner-Create';
                                        $canModifyDarkBannerPublish = $user && $user->can($darkBannerPublishPermission);
                                    @endphp

                                    <form action="{{ $hasDarkBanner ? route('darkbanner.update', $darkBanner->id) : route('darkbanner.store') }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if ($hasDarkBanner)
                                            @method('PUT')
                                        @endif
                                        <input type="hidden" name="type" value="dark_banner">

                                        <div class="card border-left-primary">
                                            <div class="card-header bg-light py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">
                                                    <i class="fas fa-moon mr-2"></i>Dark Banner Page
                                                </h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-4 mb-4">
                                                        <div class="card border-left-primary shadow h-100">
                                                            <div class="card-header bg-light">
                                                                <h6 class="m-0 font-weight-bold text-primary">
                                                                    <i class="fas fa-image mr-1"></i>Image Preview
                                                                </h6>
                                                            </div>
                                                            <div class="card-body text-center">
                                                                <div class="border rounded p-2 bg-light d-flex align-items-center justify-content-center mb-3"
                                                                    style="min-height: 240px;">
                                                                    <img id="darkBannerImagePreview"
                                                                        src="{{ $hasDarkBannerImage ? asset('storage/' . $darkBanner->image) : asset('backend/img/placeholder.jpg') }}"
                                                                        alt="Dark banner preview"
                                                                        class="img-fluid rounded shadow-sm"
                                                                        style="max-height: 220px; object-fit: cover; {{ $hasDarkBannerImage ? '' : 'opacity: .5;' }}">
                                                                </div>

                                                                <div class="custom-file text-left">
                                                                    <input type="file" name="image" id="dark_banner_image"
                                                                        class="custom-file-input @error('image', 'darkBanner') is-invalid @enderror"
                                                                        accept="image/*"
                                                                        onchange="previewDarkBannerImage(event)">
                                                                    <label class="custom-file-label" for="dark_banner_image">Choose banner image...</label>
                                                                    @error('image', 'darkBanner')
                                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                                    @enderror
                                                                </div>
                                                                <small class="text-muted mt-2 d-block">Recommended example: 1920x800px hero or section banner image.</small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-8">
                                                        <ul class="nav nav-tabs nav-fill mb-4" id="darkBannerLanguageTabs" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active {{ $errors->has('title_en') || $errors->has('subtitle_en') || $errors->has('description_en') ? 'text-danger font-weight-bold' : '' }}"
                                                                    id="dark-banner-english-tab"
                                                                    data-toggle="tab"
                                                                    href="#dark-banner-english"
                                                                    role="tab"
                                                                    aria-controls="dark-banner-english"
                                                                    aria-selected="true">
                                                                    <i class="fas fa-language mr-1"></i> English
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $errors->has('title_ne') || $errors->has('subtitle_ne') || $errors->has('description_ne') ? 'text-danger font-weight-bold' : '' }}"
                                                                    id="dark-banner-nepali-tab"
                                                                    data-toggle="tab"
                                                                    href="#dark-banner-nepali"
                                                                    role="tab"
                                                                    aria-controls="dark-banner-nepali"
                                                                    aria-selected="false">
                                                                    <i class="fas fa-language mr-1"></i> Nepali
                                                                </a>
                                                            </li>
                                                        </ul>

                                                        <div class="tab-content" id="darkBannerLanguageTabsContent">
                                                            <div class="tab-pane fade show active" id="dark-banner-english"
                                                                role="tabpanel" aria-labelledby="dark-banner-english-tab">
                                                                <div class="card border-left-success">
                                                                    <div class="card-body">
                                                                        <div class="form-group mb-3">
                                                                            <label for="dark_banner_title_en" class="font-weight-bold text-dark">
                                                                                <i class="fas fa-heading text-success mr-1"></i>Banner Title
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control @error('title_en', 'darkBanner') is-invalid @enderror"
                                                                                id="dark_banner_title_en"
                                                                                name="title_en"
                                                                                value="{{ old('title_en', $darkBanner->title_en ?? '') }}"
                                                                                placeholder="e.g., Building a smarter digital future">
                                                                            @error('title_en', 'darkBanner')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mb-3">
                                                                            <label for="dark_banner_subtitle_en" class="font-weight-bold text-dark">
                                                                                <i class="fas fa-quote-left text-success mr-1"></i>Banner Subtitle
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control @error('subtitle_en', 'darkBanner') is-invalid @enderror"
                                                                                id="dark_banner_subtitle_en"
                                                                                name="subtitle_en"
                                                                                value="{{ old('subtitle_en', $darkBanner->subtitle_en ?? '') }}"
                                                                                placeholder="e.g., Digital platforms for efficient public service">
                                                                            @error('subtitle_en', 'darkBanner')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mb-0">
                                                                            <label for="dark_banner_description_en" class="font-weight-bold text-dark">
                                                                                <i class="fas fa-align-left text-success mr-1"></i>Banner Description
                                                                            </label>
                                                                            <textarea class="form-control @error('description_en', 'darkBanner') is-invalid @enderror"
                                                                                id="dark_banner_description_en"
                                                                                name="description_en"
                                                                                rows="5"
                                                                                placeholder="e.g., A short introduction that appears on the dark banner section.">{{ old('description_en', $darkBanner->description_en ?? '') }}</textarea>
                                                                            @error('description_en', 'darkBanner')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane fade" id="dark-banner-nepali"
                                                                role="tabpanel" aria-labelledby="dark-banner-nepali-tab">
                                                                <div class="card border-left-warning">
                                                                    <div class="card-body">
                                                                        <div class="form-group mb-3">
                                                                            <label for="dark_banner_title_ne" class="font-weight-bold text-dark">
                                                                                <i class="fas fa-heading text-warning mr-1"></i>Banner Title
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control @error('title_ne', 'darkBanner') is-invalid @enderror"
                                                                                id="dark_banner_title_ne"
                                                                                name="title_ne"
                                                                                value="{{ old('title_ne', $darkBanner->title_ne ?? '') }}"
                                                                                placeholder="जस्तै, स्मार्ट डिजिटल भविष्य निर्माण">
                                                                            @error('title_ne', 'darkBanner')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mb-3">
                                                                            <label for="dark_banner_subtitle_ne" class="font-weight-bold text-dark">
                                                                                <i class="fas fa-quote-left text-warning mr-1"></i>Banner Subtitle
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control @error('subtitle_ne', 'darkBanner') is-invalid @enderror"
                                                                                id="dark_banner_subtitle_ne"
                                                                                name="subtitle_ne"
                                                                                value="{{ old('subtitle_ne', $darkBanner->subtitle_ne ?? '') }}"
                                                                                placeholder="जस्तै, प्रभावकारी सार्वजनिक सेवाका लागि डिजिटल प्लेटफर्म">
                                                                            @error('subtitle_ne', 'darkBanner')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mb-0">
                                                                            <label for="dark_banner_description_ne" class="font-weight-bold text-dark">
                                                                                <i class="fas fa-align-left text-warning mr-1"></i>Banner Description
                                                                            </label>
                                                                            <textarea class="form-control @error('description_ne', 'darkBanner') is-invalid @enderror"
                                                                                id="dark_banner_description_ne"
                                                                                name="description_ne"
                                                                                rows="5"
                                                                                placeholder="जस्तै, डार्क ब्यानर सेक्सनमा देखिने छोटो परिचय।">{{ old('description_ne', $darkBanner->description_ne ?? '') }}</textarea>
                                                                            @error('description_ne', 'darkBanner')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-4">
                                                            <div class="col-md-5">
                                                                <div class="form-group mb-md-0">
                                                                    <label for="dark_banner_position" class="font-weight-bold text-dark">
                                                                        <i class="fas fa-sort-numeric-down text-info mr-1"></i>Display Position
                                                                    </label>
                                                                    <input type="number"
                                                                        class="form-control @error('position', 'darkBanner') is-invalid @enderror"
                                                                        id="dark_banner_position"
                                                                        name="position"
                                                                        min="0"
                                                                        value="{{ old('position', $darkBanner->position ?? 0) }}"
                                                                        placeholder="e.g., 1">
                                                                    @error('position', 'darkBanner')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="custom-control custom-switch custom-control-lg mt-md-4 pt-md-2">
                                                                    <input type="checkbox"
                                                                        class="custom-control-input"
                                                                        id="dark_banner_is_active"
                                                                        name="is_active"
                                                                        value="1"
                                                                        {{ $canModifyDarkBannerPublish ? '' : 'disabled' }}
                                                                        {{ old('is_active', $hasDarkBanner ? $darkBanner->is_active : true) ? 'checked' : '' }}>
                                                                    <label class="custom-control-label font-weight-bold" for="dark_banner_is_active">
                                                                        Publish Status
                                                                    </label>
                                                                    <p class="small text-muted mb-0">Toggle to make this dark banner visible on the website.</p>
                                                                    @unless ($canModifyDarkBannerPublish)
                                                                        <small class="text-danger d-block mt-2">You do not have permission to modify this field.</small>
                                                                    @endunless
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="form-actions">
                                                    @if ($hasDarkBanner)
                                                        @can('DarkBanner-Edit')
                                                            <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-save"></i>
                                                                </span>
                                                                <span class="text">Update Dark Banner</span>
                                                            </button>
                                                        @else
                                                            <button type="button" class="btn btn-danger btn-icon-split shadow-sm" disabled>
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-ban"></i>
                                                                </span>
                                                                <span class="text">No Update Permission</span>
                                                            </button>
                                                        @endcan
                                                    @else
                                                        @can('DarkBanner-Create')
                                                            <button type="submit" class="btn btn-success btn-icon-split shadow-sm">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-save"></i>
                                                                </span>
                                                                <span class="text">Save Dark Banner</span>
                                                            </button>
                                                        @else
                                                            <button type="button" class="btn btn-danger btn-icon-split shadow-sm" disabled>
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-ban"></i>
                                                                </span>
                                                                <span class="text">No Create Permission</span>
                                                            </button>
                                                        @endcan
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endcan

                                @can('PlayStore-View')
                                <div class="tab-pane fade {{ $firstVisibleSiteSettingTab['key'] === 'namaste-pay-app' ? 'show active' : '' }}" id="page-three-panel" role="tabpanel" aria-labelledby="page-three-tab">
                                    @php
                                        $hasAppLinkPromotion = isset($appLinkPromotion) && $appLinkPromotion;
                                        $appLinkPublishPermission = $hasAppLinkPromotion ? 'PlayStore-Edit' : 'PlayStore-Create';
                                        $canModifyAppLinkPublish = $user && $user->can($appLinkPublishPermission);
                                    @endphp

                                    <form action="{{ $hasAppLinkPromotion ? route('playStore.update', $appLinkPromotion->id) : route('playStore.store') }}"
                                        method="POST">
                                        @csrf
                                        @if ($hasAppLinkPromotion)
                                            @method('PUT')
                                        @endif

                                        <input type="hidden" name="type" value="app_link">

                                        <div class="card border-left-primary">
                                            <div class="card-header py-3 bg-white">
                                                <h6 class="m-0 font-weight-bold text-primary">
                                                    <i class="fas fa-mobile-alt mr-2"></i>Page 3 Configuration
                                                </h6>
                                            </div>

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-4 mb-4 mb-lg-0">
                                                        <div class="card border-left-info shadow-sm h-100">
                                                            <div class="card-header bg-light">
                                                                <h6 class="m-0 font-weight-bold text-info">
                                                                    <i class="fas fa-link mr-1"></i> App Download Links
                                                                </h6>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="rounded bg-light border d-flex align-items-center justify-content-center mb-4"
                                                                    style="min-height: 190px;">
                                                                    <div class="text-center px-3">
                                                                        <div class="bg-white border rounded-circle shadow-sm d-flex align-items-center justify-content-center text-primary mx-auto mb-3"
                                                                            style="width: 96px; height: 96px;">
                                                                            <i class="fas fa-mobile-alt fa-3x"></i>
                                                                        </div>
                                                                        <div class="font-weight-bold text-dark">Mobile App CTA</div>
                                                                        <div class="small text-muted mt-1">
                                                                            Configure the app link promotion block for Page 3.
                                                                        </div>
                                                                    </div>
                                                                </div>
 
                                                                <div class="form-group">
                                                                    <label for="google_play_store_link" class="font-weight-bold text-dark">
                                                                        <i class="fab fa-google-play text-info mr-1"></i>Google Play Store Link
                                                                    </label>
                                                                    <input type="url"
                                                                        class="form-control @error('google_play_store_link', 'playStore') is-invalid @enderror"
                                                                        id="google_play_store_link"
                                                                        name="google_play_store_link"
                                                                        value="{{ old('google_play_store_link', $appLinkPromotion->google_play_store_link ?? '') }}"
                                                                        placeholder="https://play.google.com/store/apps/details?id=...">
                                                                    @error('google_play_store_link', 'playStore')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="app_store_link" class="font-weight-bold text-dark">
                                                                        <i class="fab fa-apple text-info mr-1"></i>App Store Link
                                                                    </label>
                                                                    <input type="url"
                                                                        class="form-control @error('app_store_link', 'playStore') is-invalid @enderror"
                                                                        id="app_store_link"
                                                                        name="app_store_link"
                                                                        value="{{ old('app_store_link', $appLinkPromotion->app_store_link ?? '') }}"
                                                                        placeholder="https://apps.apple.com/app/...">
                                                                    @error('app_store_link', 'playStore')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                                <div class="custom-control custom-switch custom-control-lg mt-4">
                                                                    <input type="checkbox"
                                                                        class="custom-control-input"
                                                                        id="app_link_is_active"
                                                                        name="is_active"
                                                                        value="1"
                                                                        {{ $canModifyAppLinkPublish ? '' : 'disabled' }}
                                                                        {{ old('is_active', $hasAppLinkPromotion ? $appLinkPromotion->is_active : true) ? 'checked' : '' }}>
                                                                    <label class="custom-control-label font-weight-bold" for="app_link_is_active">
                                                                        Publish Status
                                                                    </label>
                                                                    <p class="small text-muted mb-0">
                                                                        Toggle to show this app link promotion on the website.
                                                                    </p>
                                                                    @unless ($canModifyAppLinkPublish)
                                                                        <small class="text-danger d-block mt-2">You do not have permission to modify this field.</small>
                                                                    @endunless
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-8">
                                                        <ul class="nav nav-tabs nav-fill mb-4 site-setting-sub-tabs"
                                                            id="appLinkLanguageTabs" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active {{ $errors->has('badge_title_en') || $errors->has('title_en') || $errors->has('short_description_en') ? 'text-danger font-weight-bold' : '' }}"
                                                                    id="app-link-english-tab" data-toggle="tab"
                                                                    href="#app-link-english" role="tab"
                                                                    aria-controls="app-link-english" aria-selected="true">
                                                                    <i class="fas fa-language mr-1"></i> English
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $errors->has('badge_title_ne') || $errors->has('title_ne') || $errors->has('short_description_ne') ? 'text-danger font-weight-bold' : '' }}"
                                                                    id="app-link-nepali-tab" data-toggle="tab"
                                                                    href="#app-link-nepali" role="tab"
                                                                    aria-controls="app-link-nepali" aria-selected="false">
                                                                    <i class="fas fa-language mr-1"></i> Nepali
                                                                </a>
                                                            </li>
                                                        </ul>

                                                        <div class="tab-content" id="appLinkLanguageTabsContent">
                                                            <div class="tab-pane fade show active" id="app-link-english"
                                                                role="tabpanel" aria-labelledby="app-link-english-tab">
                                                                <div class="card border-left-success">
                                                                    <div class="card-body">
                                                                        <div class="form-group mb-3">
                                                                            <label for="app_link_badge_title_en" class="font-weight-bold text-dark">
                                                                                <i class="fas fa-tag text-success mr-1"></i>Badge Title
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control @error('badge_title_en', 'playStore') is-invalid @enderror"
                                                                                id="app_link_badge_title_en"
                                                                                name="badge_title_en"
                                                                                value="{{ old('badge_title_en', $appLinkPromotion->badge_title_en ?? '') }}"
                                                                                placeholder="e.g., Download our mobile app">
                                                                            @error('badge_title_en', 'playStore')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mb-3">
                                                                            <label for="app_link_title_en" class="font-weight-bold text-dark">
                                                                                <i class="fas fa-heading text-success mr-1"></i>Title
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control @error('title_en', 'playStore') is-invalid @enderror"
                                                                                id="app_link_title_en"
                                                                                name="title_en"
                                                                                value="{{ old('title_en', $appLinkPromotion->title_en ?? '') }}"
                                                                                placeholder="e.g., Get NDPC services on your phone">
                                                                            @error('title_en', 'playStore')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mb-0">
                                                                            <label for="app_link_short_description_en" class="font-weight-bold text-dark">
                                                                                <i class="fas fa-align-left text-success mr-1"></i>Short Description
                                                                            </label>
                                                                            <textarea class="form-control @error('short_description_en', 'playStore') is-invalid @enderror"
                                                                                id="app_link_short_description_en"
                                                                                name="short_description_en"
                                                                                rows="5"
                                                                                placeholder="e.g., Download the official mobile app for quick access to digital payment services.">{{ old('short_description_en', $appLinkPromotion->short_description_en ?? '') }}</textarea>
                                                                            @error('short_description_en', 'playStore')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane fade" id="app-link-nepali"
                                                                role="tabpanel" aria-labelledby="app-link-nepali-tab">
                                                                <div class="card border-left-warning">
                                                                    <div class="card-body">
                                                                        <div class="form-group mb-3">
                                                                            <label for="app_link_badge_title_ne" class="font-weight-bold text-dark">
                                                                                <i class="fas fa-tag text-warning mr-1"></i>Badge Title
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control @error('badge_title_ne', 'playStore') is-invalid @enderror"
                                                                                id="app_link_badge_title_ne"
                                                                                name="badge_title_ne"
                                                                                value="{{ old('badge_title_ne', $appLinkPromotion->badge_title_ne ?? '') }}"
                                                                                placeholder="मोबाइल एप डाउनलोड गर्नुहोस्">
                                                                            @error('badge_title_ne', 'playStore')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mb-3">
                                                                            <label for="app_link_title_ne" class="font-weight-bold text-dark">
                                                                                <i class="fas fa-heading text-warning mr-1"></i>Title
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control @error('title_ne', 'playStore') is-invalid @enderror"
                                                                                id="app_link_title_ne"
                                                                                name="title_ne"
                                                                                value="{{ old('title_ne', $appLinkPromotion->title_ne ?? '') }}"
                                                                                placeholder="NDPC सेवा आफ्नो फोनमा पाउनुहोस्">
                                                                            @error('title_ne', 'playStore')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mb-0">
                                                                            <label for="app_link_short_description_ne" class="font-weight-bold text-dark">
                                                                                <i class="fas fa-align-left text-warning mr-1"></i>Short Description
                                                                            </label>
                                                                            <textarea class="form-control @error('short_description_ne', 'playStore') is-invalid @enderror"
                                                                                id="app_link_short_description_ne"
                                                                                name="short_description_ne"
                                                                                rows="5"
                                                                                placeholder="आधिकारिक मोबाइल एप डाउनलोड गरी डिजिटल भुक्तानी सेवामा छिटो पहुँच पाउनुहोस्।">{{ old('short_description_ne', $appLinkPromotion->short_description_ne ?? '') }}</textarea>
                                                                            @error('short_description_ne', 'playStore')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <div class="form-actions">
                                                            @if ($hasAppLinkPromotion)
                                                                @can('PlayStore-Edit')
                                                                    <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-save"></i>
                                                                        </span>
                                                                        <span class="text">Update App Link</span>
                                                                    </button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger btn-icon-split shadow-sm" disabled>
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-ban"></i>
                                                                        </span>
                                                                        <span class="text">No Update Permission</span>
                                                                    </button>
                                                                @endcan
                                                            @else
                                                                @can('PlayStore-Create')
                                                                    <button type="submit" class="btn btn-success btn-icon-split shadow-sm">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-save"></i>
                                                                        </span>
                                                                        <span class="text">Save App Link</span>
                                                                    </button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger btn-icon-split shadow-sm" disabled>
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-ban"></i>
                                                                        </span>
                                                                        <span class="text">No Create Permission</span>
                                                                    </button>
                                                                @endcan
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endcan

                                @can('PromotionMessage-View')
                                <div class="tab-pane fade {{ $firstVisibleSiteSettingTab['key'] === 'digital-wallet' ? 'show active' : '' }}" id="page-four-panel" role="tabpanel" aria-labelledby="page-four-tab">
                                    @php
                                        $hasPromotionText = isset($promotionText) && $promotionText;
                                        $promotionTextPublishPermission = $hasPromotionText ? 'PromotionMessage-Edit' : 'PromotionMessage-Create';
                                        $canModifyPromotionTextPublish = $user && $user->can($promotionTextPublishPermission);
                                    @endphp

                                    <form action="{{ $hasPromotionText ? route('promotion_message.update', $promotionText->id) : route('promotion_message.store') }}"
                                        method="POST">
                                        @csrf
                                        @if ($hasPromotionText)
                                            @method('PUT')
                                        @endif

                                        <input type="hidden" name="type" value="promotion_text">

                                        <div class="card border-left-primary">
                                            <div class="card-header py-3 bg-white">
                                                <h6 class="m-0 font-weight-bold text-primary">
                                                    <i class="fas fa-bullhorn mr-2"></i>Page 4 Configuration
                                                </h6>
                                            </div>

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-4 mb-4 mb-lg-0">
                                                        <div class="card border-left-info shadow-sm h-100">
                                                            <div class="card-header bg-light">
                                                                <h6 class="m-0 font-weight-bold text-info">
                                                                    <i class="fas fa-quote-right mr-1"></i> Promotion Text
                                                                </h6>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="rounded bg-light border d-flex align-items-center justify-content-center mb-4"
                                                                    style="min-height: 210px;">
                                                                    <div class="text-center px-3">
                                                                        <div class="bg-white border rounded-circle shadow-sm d-flex align-items-center justify-content-center text-primary mx-auto mb-3"
                                                                            style="width: 96px; height: 96px;">
                                                                            <i class="fas fa-bullhorn fa-3x"></i>
                                                                        </div>
                                                                        <div class="font-weight-bold text-dark">Page 4 CTA Message</div>
                                                                        <div class="small text-muted mt-1">
                                                                            Configure the short promotional headline shown on Page 4.
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="custom-control custom-switch custom-control-lg">
                                                                    <input type="checkbox"
                                                                        class="custom-control-input"
                                                                        id="promotion_text_is_active"
                                                                        name="is_active"
                                                                        value="1"
                                                                        {{ $canModifyPromotionTextPublish ? '' : 'disabled' }}
                                                                        {{ old('is_active', $hasPromotionText ? $promotionText->is_active : true) ? 'checked' : '' }}>
                                                                    <label class="custom-control-label font-weight-bold" for="promotion_text_is_active">
                                                                        Publish Status
                                                                    </label>
                                                                    <p class="small text-muted mb-0">
                                                                        Toggle to show this promotion text on the website.
                                                                    </p>
                                                                    @unless ($canModifyPromotionTextPublish)
                                                                        <small class="text-danger d-block mt-2">You do not have permission to modify this field.</small>
                                                                    @endunless
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-8">
                                                        <ul class="nav nav-tabs nav-fill mb-4 site-setting-sub-tabs"
                                                            id="promotionTextLanguageTabs" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active {{ $errors->has('badge_title_en') || $errors->has('title_en') ? 'text-danger font-weight-bold' : '' }}"
                                                                    id="promotion-text-english-tab" data-toggle="tab"
                                                                    href="#promotion-text-english" role="tab"
                                                                    aria-controls="promotion-text-english" aria-selected="true">
                                                                    <i class="fas fa-language mr-1"></i> English
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $errors->has('badge_title_ne') || $errors->has('title_ne') ? 'text-danger font-weight-bold' : '' }}"
                                                                    id="promotion-text-nepali-tab" data-toggle="tab"
                                                                    href="#promotion-text-nepali" role="tab"
                                                                    aria-controls="promotion-text-nepali" aria-selected="false">
                                                                    <i class="fas fa-language mr-1"></i> Nepali
                                                                </a>
                                                            </li>
                                                        </ul>

                                                        <div class="tab-content" id="promotionTextLanguageTabsContent">
                                                            <div class="tab-pane fade show active" id="promotion-text-english"
                                                                role="tabpanel" aria-labelledby="promotion-text-english-tab">
                                                                <div class="card border-left-success">
                                                                    <div class="card-body">
                                                                        <div class="form-group mb-3">
                                                                            <label for="promotion_text_badge_title_en" class="font-weight-bold text-dark">
                                                                                <i class="fas fa-tag text-success mr-1"></i>Badge Title
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control @error('badge_title_en', 'promotion_message') is-invalid @enderror"
                                                                                id="promotion_text_badge_title_en"
                                                                                name="badge_title_en"
                                                                                value="{{ old('badge_title_en', $promotionText->badge_title_en ?? '') }}"
                                                                                placeholder="e.g., Important Update">
                                                                            @error('badge_title_en', 'promotion_message')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mb-0">
                                                                            <label for="promotion_text_title_en" class="font-weight-bold text-dark">
                                                                                <i class="fas fa-heading text-success mr-1"></i>Title
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control @error('title_en', 'promotion_message') is-invalid @enderror"
                                                                                id="promotion_text_title_en"
                                                                                name="title_en"
                                                                                value="{{ old('title_en', $promotionText->title_en ?? '') }}"
                                                                                placeholder="e.g., Fast, secure, and reliable digital services">
                                                                            @error('title_en', 'promotion_message')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane fade" id="promotion-text-nepali"
                                                                role="tabpanel" aria-labelledby="promotion-text-nepali-tab">
                                                                <div class="card border-left-warning">
                                                                    <div class="card-body">
                                                                        <div class="form-group mb-3">
                                                                            <label for="promotion_text_badge_title_ne" class="font-weight-bold text-dark">
                                                                                <i class="fas fa-tag text-warning mr-1"></i>Badge Title
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control @error('badge_title_ne', 'promotion_message') is-invalid @enderror"
                                                                                id="promotion_text_badge_title_ne"
                                                                                name="badge_title_ne"
                                                                                value="{{ old('badge_title_ne', $promotionText->badge_title_ne ?? '') }}"
                                                                                placeholder="महत्त्वपूर्ण अपडेट">
                                                                            @error('badge_title_ne', 'promotion_message')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mb-0">
                                                                            <label for="promotion_text_title_ne" class="font-weight-bold text-dark">
                                                                                <i class="fas fa-heading text-warning mr-1"></i>Title
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control @error('title_ne', 'promotion_message') is-invalid @enderror"
                                                                                id="promotion_text_title_ne"
                                                                                name="title_ne"
                                                                                value="{{ old('title_ne', $promotionText->title_ne ?? '') }}"
                                                                                placeholder="छिटो, सुरक्षित र भरपर्दो डिजिटल सेवा">
                                                                            @error('title_ne', 'promotion_message')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <div class="form-actions">
                                                            @if ($hasPromotionText)
                                                                @can('PromotionMessage-Edit')
                                                                    <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-save"></i>
                                                                        </span>
                                                                        <span class="text">Update Promotion Text</span>
                                                                    </button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger btn-icon-split shadow-sm" disabled>
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-ban"></i>
                                                                        </span>
                                                                        <span class="text">No Update Permission</span>
                                                                    </button>
                                                                @endcan
                                                            @else
                                                                @can('PromotionMessage-Create')
                                                                    <button type="submit" class="btn btn-success btn-icon-split shadow-sm">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-save"></i>
                                                                        </span>
                                                                        <span class="text">Save Promotion Text</span>
                                                                    </button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger btn-icon-split shadow-sm" disabled>
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-ban"></i>
                                                                        </span>
                                                                        <span class="text">No Create Permission</span>
                                                                    </button>
                                                                @endcan
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endcan

                                @can('CompanyGoal-View')
                                <div class="tab-pane fade {{ $firstVisibleSiteSettingTab['key'] === 'company-goal' ? 'show active' : '' }}" id="company-goal-panel" role="tabpanel" aria-labelledby="company-goal-tab">
                                    @php
                                        $companyGoal = $companyGoal ?? null;
                                        $hasCompanyGoal = isset($companyGoal) && $companyGoal;
                                        $hasCompanyGoalImage = $hasCompanyGoal && $companyGoal->image;
                                        $companyGoalPublishPermission = $hasCompanyGoal ? 'CompanyGoal-Edit' : 'CompanyGoal-Create';
                                        $canModifyCompanyGoalPublish = $user && $user->can($companyGoalPublishPermission);
                                    @endphp

                                    <form action="{{ $hasCompanyGoal ? route('company_goals.update', $companyGoal->id) : route('company_goals.store') }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if ($hasCompanyGoal)
                                            @method('PUT')
                                        @endif

                                        <div class="card border-left-primary">
                                            <div class="card-header py-3 bg-white">
                                                <h6 class="m-0 font-weight-bold text-primary">
                                                    <i class="fas fa-bullseye mr-2"></i>Company Goal Configuration
                                                </h6>
                                            </div>

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-4 mb-4 mb-lg-0">
                                                        <div class="card border-left-primary shadow-sm h-100">
                                                            <div class="card-header bg-light">
                                                                <h6 class="m-0 font-weight-bold text-primary">
                                                                    <i class="fas fa-image mr-1"></i> Image Preview
                                                                </h6>
                                                            </div>
                                                            <div class="card-body text-center">
                                                                <div class="border rounded p-2 bg-light d-flex align-items-center justify-content-center mb-3"
                                                                    style="min-height: 240px;">
                                                                    <img id="companyGoalImagePreview"
                                                                        src="{{ $hasCompanyGoalImage ? asset('storage/' . $companyGoal->image) : asset('backend/img/placeholder.jpg') }}"
                                                                        alt="Company Goal Image Preview"
                                                                        class="img-fluid rounded shadow-sm"
                                                                        style="max-height: 220px; object-fit: cover; {{ $hasCompanyGoalImage ? '' : 'opacity: 0.5;' }}">
                                                                </div>

                                                                <div class="custom-file text-left">
                                                                    <input type="file"
                                                                        name="image"
                                                                        class="custom-file-input @error('image') is-invalid @enderror"
                                                                        id="company_goal_image"
                                                                        accept="image/*"
                                                                        onchange="previewCompanyGoalImage(event)">
                                                                    <label class="custom-file-label" for="company_goal_image">Choose image...</label>
                                                                    @error('image')
                                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                                    @enderror
                                                                </div>
                                                                <small class="text-muted mt-2 d-block">Recommended image size: 800x600px</small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-8">
                                                        <ul class="nav nav-tabs nav-fill mb-4 site-setting-sub-tabs"
                                                            id="companyGoalLanguageTabs" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active {{ $errors->has('badge_title_en') || $errors->has('description_en') ? 'text-danger font-weight-bold' : '' }}"
                                                                    id="company-goal-english-tab" data-toggle="tab"
                                                                    href="#company-goal-english" role="tab"
                                                                    aria-controls="company-goal-english" aria-selected="true">
                                                                    <i class="fas fa-language mr-1"></i> English
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $errors->has('badge_title_ne') || $errors->has('description_ne') ? 'text-danger font-weight-bold' : '' }}"
                                                                    id="company-goal-nepali-tab" data-toggle="tab"
                                                                    href="#company-goal-nepali" role="tab"
                                                                    aria-controls="company-goal-nepali" aria-selected="false">
                                                                    <i class="fas fa-language mr-1"></i> Nepali
                                                                </a>
                                                            </li>
                                                        </ul>

                                                        <div class="tab-content" id="companyGoalLanguageTabsContent">
                                                            <div class="tab-pane fade show active" id="company-goal-english"
                                                                role="tabpanel" aria-labelledby="company-goal-english-tab">
                                                                <div class="card border-left-success">
                                                                    <div class="card-body">
                                                                        <div class="form-group mb-3">
                                                                            <label for="company_goal_badge_title_en" class="form-label">
                                                                                <i class="fas fa-tag text-success"></i> Badge Title
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control @error('badge_title_en') is-invalid @enderror"
                                                                                id="company_goal_badge_title_en"
                                                                                name="badge_title_en"
                                                                                value="{{ old('badge_title_en', $companyGoal->badge_title_en ?? '') }}"
                                                                                placeholder="Enter English badge title">
                                                                            @error('badge_title_en')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mb-0">
                                                                            <label for="company_goal_description_en" class="form-label">
                                                                                <i class="fas fa-align-left text-success"></i> Description
                                                                            </label>
                                                                            <textarea class="form-control @error('description_en') is-invalid @enderror"
                                                                                id="company_goal_description_en"
                                                                                name="description_en"
                                                                                rows="6"
                                                                                placeholder="Enter English description">{{ old('description_en', $companyGoal->description_en ?? '') }}</textarea>
                                                                            @error('description_en')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane fade" id="company-goal-nepali"
                                                                role="tabpanel" aria-labelledby="company-goal-nepali-tab">
                                                                <div class="card border-left-warning">
                                                                    <div class="card-body">
                                                                        <div class="form-group mb-3">
                                                                            <label for="company_goal_badge_title_ne" class="form-label">
                                                                                <i class="fas fa-tag text-warning"></i> Badge Title
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control @error('badge_title_ne') is-invalid @enderror"
                                                                                id="company_goal_badge_title_ne"
                                                                                name="badge_title_ne"
                                                                                value="{{ old('badge_title_ne', $companyGoal->badge_title_ne ?? '') }}"
                                                                                placeholder="Enter Nepali badge title">
                                                                            @error('badge_title_ne')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mb-0">
                                                                            <label for="company_goal_description_ne" class="form-label">
                                                                                <i class="fas fa-align-left text-warning"></i> Description
                                                                            </label>
                                                                            <textarea class="form-control @error('description_ne') is-invalid @enderror"
                                                                                id="company_goal_description_ne"
                                                                                name="description_ne"
                                                                                rows="6"
                                                                                placeholder="Enter Nepali description">{{ old('description_ne', $companyGoal->description_ne ?? '') }}</textarea>
                                                                            @error('description_ne')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="custom-control custom-switch custom-control-lg mt-4">
                                                            <input type="checkbox"
                                                                class="custom-control-input"
                                                                id="company_goal_is_active"
                                                                name="is_active"
                                                                value="1"
                                                                {{ $canModifyCompanyGoalPublish ? '' : 'disabled' }}
                                                                {{ old('is_active', $hasCompanyGoal ? $companyGoal->is_active : true) ? 'checked' : '' }}>
                                                            <label class="custom-control-label font-weight-bold" for="company_goal_is_active">
                                                                Publish Status
                                                            </label>
                                                            <p class="small text-muted mb-0">
                                                                Toggle to make this company goal visible on the website front-end.
                                                            </p>
                                                            @unless ($canModifyCompanyGoalPublish)
                                                                <small class="text-danger d-block mt-2">You do not have permission to modify this field.</small>
                                                            @endunless
                                                        </div>

                                                        <hr>

                                                        <div class="form-actions">
                                                            @if ($hasCompanyGoal)
                                                                @can('CompanyGoal-Edit')
                                                                    <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-save"></i>
                                                                        </span>
                                                                        <span class="text">Update Company Goal</span>
                                                                    </button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger btn-icon-split shadow-sm" disabled>
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-ban"></i>
                                                                        </span>
                                                                        <span class="text">No Update Permission</span>
                                                                    </button>
                                                                @endcan
                                                            @else
                                                                @can('CompanyGoal-Create')
                                                                    <button type="submit" class="btn btn-success btn-icon-split shadow-sm">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-save"></i>
                                                                        </span>
                                                                        <span class="text">Save Company Goal</span>
                                                                    </button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger btn-icon-split shadow-sm" disabled>
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-ban"></i>
                                                                        </span>
                                                                        <span class="text">No Create Permission</span>
                                                                    </button>
                                                                @endcan
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endcan

                                @if ($visibleSiteSettingTabs->isEmpty())
                                    <div class="alert alert-warning mb-0">
                                        You do not have permission to view any site setting tabs.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(function() {
            const activeTabStoragePrefix = 'siteSettingActiveTab:';
            const tabGroups = [
                '#siteSettingMainTabs',
                '#pageOneSettingTabs',
                '#contactLanguageTabs',
                '#officerLanguageTabs',
                '#footerLanguageTabs',
                '#darkBannerLanguageTabs',
                '#appLinkLanguageTabs',
                '#promotionTextLanguageTabs',
                '#companyGoalLanguageTabs'
            ];

            function saveActiveTab($tabLink) {
                const $tabGroup = $tabLink.closest('[role="tablist"]');
                const tabGroupId = $tabGroup.attr('id');
                const tabTarget = $tabLink.attr('href');

                if (tabGroupId && tabTarget) {
                    localStorage.setItem(activeTabStoragePrefix + tabGroupId, tabTarget);
                }
            }

            tabGroups.forEach(function(tabGroupSelector) {
                const $tabGroup = $(tabGroupSelector);
                const tabGroupId = $tabGroup.attr('id');
                const activeTabTarget = localStorage.getItem(activeTabStoragePrefix + tabGroupId);

                if (activeTabTarget) {
                    $tabGroup.find('[data-toggle="tab"][href="' + activeTabTarget + '"], [data-toggle="pill"][href="' + activeTabTarget + '"]').tab('show');
                }
            });

            $('.site-setting-tab-shell').css('visibility', 'visible');

            $('[data-toggle="tab"], [data-toggle="pill"]').on('shown.bs.tab', function() {
                saveActiveTab($(this));
            });

            $('form').on('submit', function() {
                $('[role="tablist"]').each(function() {
                    const $activeTab = $(this).find('[data-toggle="tab"].active, [data-toggle="pill"].active').first();

                    if ($activeTab.length) {
                        saveActiveTab($activeTab);
                    }
                });
            });
        });
    </script>
    <script>
        function previewSiteLogo(event, previewId) {
            const file = event.target.files[0];
            const preview = document.getElementById(previewId);
            const label = event.target.nextElementSibling;

            if (file) {
                label.innerText = file.name;

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.opacity = '1';
                };
                reader.readAsDataURL(file);
            }
        }

        function previewDarkBannerImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('darkBannerImagePreview');
            const label = event.target.nextElementSibling;

            if (file) {
                label.innerText = file.name;

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.opacity = '1';
                };
                reader.readAsDataURL(file);
            }
        }

        function previewCompanyGoalImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('companyGoalImagePreview');
            const label = event.target.nextElementSibling;

            if (file) {
                label.innerText = file.name;

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.opacity = '1';
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
    <style>
        .site-setting-tabs {
            border: 1px solid #e3e6f0;
            border-radius: .35rem;
            overflow: hidden;
        }

        .site-setting-tabs .nav-link {
            border-radius: 0;
            color: #5a5c69;
            font-weight: 700;
            padding: 1rem;
            border-bottom: 1px solid #e3e6f0;
        }

        .site-setting-tabs .nav-link:last-child {
            border-bottom: 0;
        }

        .site-setting-tabs .nav-link.active {
            color: #fff;
            background-color: #4e73df;
        }

        .site-tab-title,
        .site-tab-subtitle {
            display: block;
        }

        .site-tab-title {
            font-size: .95rem;
            line-height: 1.2;
        }

        .site-tab-subtitle {
            color: #858796;
            font-size: .78rem;
            font-weight: 600;
            margin-top: .25rem;
            padding-left: 1.65rem;
        }

        .site-setting-tabs .nav-link.active .site-tab-subtitle {
            color: rgba(255, 255, 255, .82);
        }

        .site-setting-sub-tabs {
            flex-wrap: wrap;
        }

        .site-setting-sub-tabs .nav-link {
            color: #5a5c69;
            font-weight: 700;
            white-space: nowrap;
        }

        .site-setting-sub-tabs .nav-link.active {
            color: #4e73df;
        }

        .site-logo-preview {
            min-height: 180px;
            padding: 1rem;
        }

        .site-logo-preview img {
            max-height: 145px;
            object-fit: contain;
        }

        @media (max-width: 991.98px) {
            .site-setting-tabs {
                flex-direction: row !important;
            }

            .site-setting-tabs .nav-link {
                width: 50%;
                border-bottom: 1px solid #e3e6f0;
            }

            .site-setting-sub-tabs .nav-item {
                flex-basis: 50%;
            }
        }
    </style>

@endpush
