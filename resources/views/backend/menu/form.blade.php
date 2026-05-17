@extends('backend.layout.main')

@section('content')
    @php
        $selectedType = old('is_main_child', $data->is_main_child ?? 'parent_menu');
        $hasNepaliError =
            $errors->has('menu_name_ne') ||
            $errors->has('page_title_ne') ||
            $errors->has('description_ne') ||
            $errors->has('content_ne');

        $templateOptions = [
            '' => 'Default Template',
            'home' => 'Home',
            'about' => 'About',
            'contact' => 'Contact',
            'gallery' => 'Gallery',
            'news' => 'News',
            'custom' => 'Custom Page',
        ];

        $menuLocations = [
            'header' => 'Header',
            'footer' => 'Footer',
            'header_footer' => 'Header & Footer',
            'useful_links' => 'Useful Links',
        ];

        $imagePreview = isset($data) && $data->image ? asset('storage/' . $data->image) : '';
        $ogImagePreview = isset($data) && $data->og_image ? asset('storage/' . $data->og_image) : '';
    @endphp

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">{{ isset($data) ? 'Edit Menu' : 'Create Menu' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('menu.index') }}">Menus</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ isset($data) ? 'Edit Menu' : 'Create Menu' }}
                    </li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('menu.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-list fa-sm text-white-50 mr-2"></i> View List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-left-primary menu-form-card">
                <div class="card-header py-3 bg-white d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-bars mr-2"></i>{{ isset($data) ? 'Update Menu Information' : 'Menu Information' }}
                    </h6>
                    <span
                        class="badge badge-pill {{ old('is_active', isset($data) ? $data->is_active : true) ? 'badge-success' : 'badge-secondary' }}">
                        {{ old('is_active', isset($data) ? $data->is_active : true) ? 'Published' : 'Draft' }}
                    </span>
                </div>

                <form action="{{ isset($data) ? route('menu.update', $data->id) : route('menu.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if (isset($data))
                        @method('PUT')
                    @endif

                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="form-section-title">
                                    <h6 class="m-0 font-weight-bold text-primary">Basic Setup</h6>
                                </div>

                                <div class="form-row mt-3">
                                    <div class="form-group col-md-4">
                                        <label for="position" class="small font-weight-bold text-dark">Position</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fas fa-sort-numeric-down"></i></span>
                                            </div>
                                            <input readonly type="number" id="position" name="position"
                                                class="form-control @error('position') is-invalid @enderror"
                                                value="{{ old('position', $data->position ?? 0) }}" min="0">
                                        </div>
                                        @error('position')
                                            <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="menu_location" class="small font-weight-bold text-dark">Menu
                                            Location</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                            </div>
                                            <select id="menu_location" name="menu_location"
                                                class="form-control @error('menu_location') is-invalid @enderror">
                                                @foreach ($menuLocations as $value => $label)
                                                    <option value="{{ $value }}"
                                                        {{ old('menu_location', $data->menu_location ?? 'header') == $value ? 'selected' : '' }}>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" id="locked_menu_location" name="menu_location"
                                                value="{{ old('menu_location', $data->menu_location ?? 'header') }}"
                                                disabled>
                                        </div>
                                        @error('menu_location')
                                            <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="page_template" class="small font-weight-bold text-dark">Page
                                            Template</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                            </div>
                                            <select id="page_template" name="page_template"
                                                class="form-control @error('page_template') is-invalid @enderror">
                                                @foreach ($templateOptions as $value => $label)
                                                    <option value="{{ $value }}"
                                                        {{ old('page_template', $data->page_template ?? '') == $value ? 'selected' : '' }}>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('page_template')
                                            <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="is_main_child" class="small font-weight-bold text-dark">Menu
                                            Type</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sitemap"></i></span>
                                            </div>
                                            <select id="is_main_child" name="is_main_child"
                                                class="form-control @error('is_main_child') is-invalid @enderror">
                                                <option value="parent_menu"
                                                    {{ $selectedType == 'parent_menu' ? 'selected' : '' }}>Parent Menu
                                                </option>
                                                <option value="child_menu"
                                                    {{ $selectedType == 'child_menu' ? 'selected' : '' }}>Child Menu
                                                </option>
                                            </select>
                                        </div>
                                        @error('is_main_child')
                                            <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 {{ $selectedType == 'child_menu' ? '' : 'd-none' }}"
                                        id="parentMenuWrapper">
                                        <label for="parent_id" class="small font-weight-bold text-dark">Parent Menu</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-level-up-alt"></i></span>
                                            </div>
                                            <select id="parent_id" name="parent_id"
                                                class="form-control @error('parent_id') is-invalid @enderror">

                                                <option value="">Choose parent menu...</option>

                                                @foreach ($parentMenus as $parentMenu)
                                                    <option value="{{ $parentMenu->id }}"
                                                        data-menu-location="{{ $parentMenu->menu_location }}"
                                                        {{ (string) old('parent_id', $data->parent_id ?? '') === (string) $parentMenu->id ? 'selected' : '' }}>
                                                        {{ $parentMenu->menu_name_en . ' (' . $parentMenu->menu_location . ')' }}
                                                    </option>

                                                    @foreach ($parentMenu->children as $childMenu)
                                                        <option value="{{ $childMenu->id }}"
                                                            data-menu-location="{{ $childMenu->menu_location }}"
                                                            {{ (string) old('parent_id', $data->parent_id ?? '') === (string) $childMenu->id ? 'selected' : '' }}>
                                                            -- {{ $childMenu->menu_name_en }}
                                                        </option>
                                                    @endforeach
                                                @endforeach

                                            </select>
                                        </div>
                                        <small class="text-muted">Available only for child menu items.</small>
                                        @error('parent_id')
                                            <span class="text-danger small d-block"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="external_link" class="small font-weight-bold text-dark">External
                                            Link</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                                            </div>
                                            <input type="url" id="external_link" name="external_link"
                                                class="form-control @error('external_link') is-invalid @enderror"
                                                value="{{ old('external_link', $data->external_link ?? '') }}"
                                                placeholder="https://example.com">
                                        </div>
                                        @error('external_link')
                                            <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="slug" class="small font-weight-bold text-dark">Slug</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            </div>
                                            <input readonly type="text" id="slug" name="slug"
                                                class="form-control @error('slug') is-invalid @enderror"
                                                value="{{ old('slug', $data->slug ?? '') }}"
                                                placeholder="auto-generated-if-empty">
                                        </div>
                                        @error('slug')
                                            <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-section-title mt-4">
                                    <h6 class="m-0 font-weight-bold text-primary">Page Content</h6>
                                </div>

                                <ul class="nav nav-tabs nav-fill mt-3 mb-4 menu-language-tabs" id="menuLanguageTabs"
                                    role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button
                                            class="nav-link {{ $hasNepaliError ? '' : 'active' }} {{ $errors->has('menu_name_en') || $errors->has('page_title_en') || $errors->has('description_en') || $errors->has('content_en') ? 'text-danger font-weight-bold' : '' }}"
                                            id="menu-english-tab" data-bs-toggle="tab" data-bs-target="#menuEnglish"
                                            type="button" role="tab" aria-controls="menuEnglish"
                                            aria-selected="{{ $hasNepaliError ? 'false' : 'true' }}">
                                            <i class="fas fa-language mr-1"></i> English
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button
                                            class="nav-link {{ $hasNepaliError ? 'active' : '' }} {{ $hasNepaliError ? 'text-danger font-weight-bold' : '' }}"
                                            id="menu-nepali-tab" data-bs-toggle="tab" data-bs-target="#menuNepali"
                                            type="button" role="tab" aria-controls="menuNepali"
                                            aria-selected="{{ $hasNepaliError ? 'true' : 'false' }}">
                                            <i class="fas fa-language mr-1"></i> नेपाली
                                        </button>
                                    </li>
                                </ul>

                                <div class="tab-content" id="menuLanguageTabsContent">
                                    <div class="tab-pane fade {{ $hasNepaliError ? '' : 'show active' }}" id="menuEnglish"
                                        role="tabpanel" aria-labelledby="menu-english-tab">
                                        <div class="card border-left-success">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="menu_name_en" class="small font-weight-bold text-dark">Menu
                                                        Name <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-heading"></i></span>
                                                        </div>
                                                        <input type="text" id="menu_name_en" name="menu_name_en"
                                                            class="form-control @error('menu_name_en') is-invalid @enderror"
                                                            value="{{ old('menu_name_en', $data->menu_name_en ?? '') }}"
                                                            placeholder="Enter menu name">
                                                    </div>
                                                    @error('menu_name_en')
                                                        <span
                                                            class="text-danger small"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="page_title_en" class="small font-weight-bold text-dark">Page
                                                        Title</label>
                                                    <input type="text" id="page_title_en" name="page_title_en"
                                                        class="form-control @error('page_title_en') is-invalid @enderror"
                                                        value="{{ old('page_title_en', $data->page_title_en ?? '') }}"
                                                        placeholder="Enter page title">
                                                    @error('page_title_en')
                                                        <span
                                                            class="text-danger small"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="description_en"
                                                        class="small font-weight-bold text-dark">Page Banner Short
                                                        Description</label>
                                                    <textarea id="description_en" name="description_en" rows="4"
                                                        class="form-control @error('description_en') is-invalid @enderror" placeholder="Write short description">{{ old('description_en', $data->description_en ?? '') }}</textarea>
                                                    @error('description_en')
                                                        <span
                                                            class="text-danger small"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="content_en"
                                                        class="small font-weight-bold text-dark">Content</label>
                                                    <textarea id="content_en" name="content_en" rows="5"
                                                        class="form-control @error('content_en') is-invalid @enderror" placeholder="Write page content">{{ old('content_en', $data->content_en ?? '') }}</textarea>
                                                    @error('content_en')
                                                        <span
                                                            class="text-danger small"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade {{ $hasNepaliError ? 'show active' : '' }}" id="menuNepali"
                                        role="tabpanel" aria-labelledby="menu-nepali-tab">
                                        <div class="card border-left-warning">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="menu_name_ne" class="small font-weight-bold text-dark">Menu
                                                        Name</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-heading"></i></span>
                                                        </div>
                                                        <input type="text" id="menu_name_ne" name="menu_name_ne"
                                                            class="form-control @error('menu_name_ne') is-invalid @enderror"
                                                            value="{{ old('menu_name_ne', $data->menu_name_ne ?? '') }}"
                                                            placeholder="मेनुको नाम प्रविष्ट गर्नुहोस्">
                                                    </div>
                                                    @error('menu_name_ne')
                                                        <span
                                                            class="text-danger small"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="page_title_ne" class="small font-weight-bold text-dark">Page
                                                        Title</label>
                                                    <input type="text" id="page_title_ne" name="page_title_ne"
                                                        class="form-control @error('page_title_ne') is-invalid @enderror"
                                                        value="{{ old('page_title_ne', $data->page_title_ne ?? '') }}"
                                                        placeholder="पृष्ठ शीर्षक प्रविष्ट गर्नुहोस्">
                                                    @error('page_title_ne')
                                                        <span
                                                            class="text-danger small"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="description_ne"
                                                        class="small font-weight-bold text-dark">Page Banner Short
                                                        Description</label>
                                                    <textarea id="description_ne" name="description_ne" rows="4"
                                                        class="form-control @error('description_ne') is-invalid @enderror" placeholder="छोटो विवरण लेख्नुहोस्">{{ old('description_ne', $data->description_ne ?? '') }}</textarea>
                                                    @error('description_ne')
                                                        <span
                                                            class="text-danger small"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="content_ne"
                                                        class="small font-weight-bold text-dark">Content</label>
                                                    <textarea id="content_ne" name="content_ne" rows="5"
                                                        class="form-control @error('content_ne') is-invalid @enderror" placeholder="पृष्ठ सामग्री लेख्नुहोस्">{{ old('content_ne', $data->content_ne ?? '') }}</textarea>
                                                    @error('content_ne')
                                                        <span
                                                            class="text-danger small"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="menu-side-panel bg-light rounded border p-3">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            <i class="fas fa-image mr-2"></i>Media
                                        </h6>
                                        <span class="small text-muted">Live preview</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="small font-weight-bold text-dark">Menu Image</label>
                                        <div class="menu-image-preview border rounded bg-white mb-2">
                                            <img id="imagePreview" src="{{ $imagePreview }}" alt="Menu image preview"
                                                class="{{ $imagePreview ? '' : 'd-none' }}">
                                            <div id="imagePlaceholder"
                                                class="preview-placeholder {{ $imagePreview ? 'd-none' : '' }}">
                                                <i class="fas fa-cloud-upload-alt fa-2x text-primary mb-2"></i>
                                                <span>Choose an image</span>
                                            </div>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" id="image" name="image"
                                                class="custom-file-input @error('image') is-invalid @enderror"
                                                accept="image/*" data-preview-target="imagePreview"
                                                data-placeholder-target="imagePlaceholder">
                                            <label class="custom-file-label" for="image">Choose menu image...</label>
                                        </div>
                                        @if (isset($data) && $data->image)
                                            <small class="text-muted d-block mt-2">Current: {{ $data->image }}</small>
                                        @endif
                                        @error('image')
                                            <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="og_image" class="small font-weight-bold text-dark">OG Image</label>
                                        <div class="menu-image-preview border rounded bg-white mb-2">
                                            <img id="ogImagePreview" src="{{ $ogImagePreview }}" alt="OG image preview"
                                                class="{{ $ogImagePreview ? '' : 'd-none' }}">
                                            <div id="ogImagePlaceholder"
                                                class="preview-placeholder {{ $ogImagePreview ? 'd-none' : '' }}">
                                                <i class="fas fa-share-alt fa-2x text-primary mb-2"></i>
                                                <span>Social preview image</span>
                                            </div>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" id="og_image" name="og_image"
                                                class="custom-file-input @error('og_image') is-invalid @enderror"
                                                accept="image/*" data-preview-target="ogImagePreview"
                                                data-placeholder-target="ogImagePlaceholder">
                                            <label class="custom-file-label" for="og_image">Choose OG image...</label>
                                        </div>
                                        @if (isset($data) && $data->og_image)
                                            <small class="text-muted d-block mt-2">Current: {{ $data->og_image }}</small>
                                        @endif
                                        @error('og_image')
                                            <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="custom-control custom-switch custom-control-lg border-top pt-3">
                                        <input type="checkbox" class="custom-control-input" id="is_active"
                                            name="is_active" value="1"
                                            {{ old('is_active', isset($data) ? $data->is_active : true) ? 'checked' : '' }}>
                                        <label class="custom-control-label font-weight-bold" for="is_active">Publish
                                            Status</label>
                                        <p class="small text-muted mb-0">Toggle to make this menu visible on the website.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-section-title mt-4">
                            <h6 class="m-0 font-weight-bold text-primary">SEO & Social Sharing</h6>
                        </div>

                        <div class="form-row mt-3">
                            <div class="form-group col-md-6">
                                <label for="meta_title_en" class="small font-weight-bold text-dark">Meta Title</label>
                                <input type="text" id="meta_title_en" name="meta_title_en"
                                    class="form-control @error('meta_title_en') is-invalid @enderror"
                                    value="{{ old('meta_title_en', $data->meta_title_en ?? '') }}"
                                    placeholder="Search result title">
                                @error('meta_title_en')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="meta_keywords_en" class="small font-weight-bold text-dark">Meta Keywords</label>
                                <input type="text" id="meta_keywords_en" name="meta_keywords_en"
                                    class="form-control @error('meta_keywords_en') is-invalid @enderror"
                                    value="{{ old('meta_keywords_en', $data->meta_keywords_en ?? '') }}"
                                    placeholder="keyword one, keyword two">
                                @error('meta_keywords_en')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="meta_description_en" class="small font-weight-bold text-dark">Meta
                                    Description</label>
                                <textarea id="meta_description_en" name="meta_description_en" rows="3"
                                    class="form-control @error('meta_description_en') is-invalid @enderror"
                                    placeholder="Short search engine description">{{ old('meta_description_en', $data->meta_description_en ?? '') }}</textarea>
                                @error('meta_description_en')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="canonical_url" class="small font-weight-bold text-dark">Canonical URL</label>
                                <input type="url" id="canonical_url" name="canonical_url"
                                    class="form-control @error('canonical_url') is-invalid @enderror"
                                    value="{{ old('canonical_url', $data->canonical_url ?? '') }}"
                                    placeholder="https://example.com/page">
                                @error('canonical_url')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="og_title_en" class="small font-weight-bold text-dark">OG Title</label>
                                <input type="text" id="og_title_en" name="og_title_en"
                                    class="form-control @error('og_title_en') is-invalid @enderror"
                                    value="{{ old('og_title_en', $data->og_title_en ?? '') }}"
                                    placeholder="Social share title">
                                @error('og_title_en')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="og_description_en" class="small font-weight-bold text-dark">OG
                                    Description</label>
                                <textarea id="og_description_en" name="og_description_en" rows="3"
                                    class="form-control @error('og_description_en') is-invalid @enderror" placeholder="Social share description">{{ old('og_description_en', $data->og_description_en ?? '') }}</textarea>
                                @error('og_description_en')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-actions mt-4 border-top pt-4">
                            <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                <span class="text">{{ isset($data) ? 'Update Menu' : 'Save Menu' }}</span>
                            </button>
                            <a href="{{ route('menu.index') }}" class="btn btn-secondary btn-icon-split shadow-sm ml-2">
                                <span class="icon text-white-50"><i class="fas fa-times"></i></span>
                                <span class="text">Cancel</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function toggleParentMenuField() {
            const $typeSelect = $('#is_main_child');
            const $parentWrapper = $('#parentMenuWrapper');
            const $parentSelect = $('#parent_id');
            const $menuLocation = $('#menu_location');
            const $lockedMenuLocation = $('#locked_menu_location');
            const isChild = $typeSelect.val() === 'child_menu';
            const parentLocation = $parentSelect.find(':selected').data('menu-location');

            $parentWrapper.toggleClass('d-none', !isChild);
            $parentWrapper.toggleClass('menu-field-disabled', !isChild);

            if (!isChild) {
                $parentSelect.val('');
                $menuLocation.prop('disabled', false);
                $lockedMenuLocation.prop('disabled', true);
                return;
            }

            if (parentLocation) {
                $menuLocation.val(parentLocation);
            }

            $lockedMenuLocation.val($menuLocation.val()).prop('disabled', false);
            $menuLocation.prop('disabled', true);
        }

        function updateFilePreview(input) {
            const file = input.files.length ? input.files[0] : null;
            const fileName = file ? file.name : 'Choose file...';
            const label = input.nextElementSibling;
            const preview = document.getElementById(input.dataset.previewTarget);
            const placeholder = document.getElementById(input.dataset.placeholderTarget);

            if (label) {
                label.textContent = fileName;
            }

            if (!file || !preview) {
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');

                if (placeholder) {
                    placeholder.classList.add('d-none');
                }
            };
            reader.readAsDataURL(file);
        }

        $('#is_main_child, #parent_id').on('change', toggleParentMenuField);
        toggleParentMenuField();

        document.querySelectorAll('.custom-file-input').forEach(function(input) {
            input.addEventListener('change', function() {
                updateFilePreview(input);
            });
        });

        document.querySelectorAll('#menuLanguageTabs [data-bs-toggle="tab"]').forEach(function(tab) {
            tab.addEventListener('click', function(event) {
                event.preventDefault();

                const target = document.querySelector(this.dataset.bsTarget);

                if (!target) {
                    return;
                }

                document.querySelectorAll('#menuLanguageTabs .nav-link').forEach(function(languageTab) {
                    languageTab.classList.remove('active');
                    languageTab.setAttribute('aria-selected', 'false');
                });

                document.querySelectorAll('#menuLanguageTabsContent .tab-pane').forEach(function(pane) {
                    pane.classList.remove('show', 'active');
                });

                this.classList.add('active');
                this.setAttribute('aria-selected', 'true');
                target.classList.add('show', 'active');
            });
        });
    </script>
@endpush
