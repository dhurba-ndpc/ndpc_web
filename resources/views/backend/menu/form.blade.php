@extends('backend.layout.main')

@section('content')
    @php
        $selectedType = old('is_main_child', $data->is_main_child ?? 'parent_menu');
        $parentMenus = collect($parentMenus ?? ($menus ?? ($lists ?? [])))->where('is_main_child', 'parent_menu');
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
            <div class="card shadow mb-4 border-left-primary">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-bars mr-2"></i>{{ isset($data) ? 'Update Menu Information' : 'Menu Information' }}
                    </h6>
                </div>

                <form action="{{ isset($data) ? route('menu.update', $data->id) : route('menu.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if (isset($data))
                        @method('PUT')
                    @endif

                    <div class="card-body">
                        <div class="form-section-title">
                            <h6 class="m-0 font-weight-bold text-primary">Basic Setup</h6>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="menu_name" class="small font-weight-bold text-dark">Menu Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                    </div>
                                    <input type="text" id="menu_name" name="menu_name"
                                        class="form-control @error('menu_name') is-invalid @enderror"
                                        value="{{ old('menu_name', $data->menu_name ?? '') }}"
                                        placeholder="Enter menu name">
                                </div>
                                @error('menu_name')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="menu_location" class="small font-weight-bold text-dark">Select Page
                                    template</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                    </div>
                                    <select id="page_template" name="menu_location"
                                        class="form-control @error('menu_location') is-invalid @enderror">
                                        @foreach (['header' => 'Header', 'footer' => 'Footer', 'header_footer' => 'Header & Footer', 'useful_links' => 'Useful Links'] as $value => $label)
                                            <option value="{{ $value }}"
                                                {{ old('menu_location', $data->menu_location ?? 'header') == $value ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>



                                @error('category_slug')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>


                            <div class="form-group col-md-3">
                                <label for="menu_location" class="small font-weight-bold text-dark">Menu Location</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                    <select id="menu_location" name="menu_location"
                                        class="form-control @error('menu_location') is-invalid @enderror">
                                        @foreach (['header' => 'Header', 'footer' => 'Footer', 'header_footer' => 'Header & Footer', 'useful_links' => 'Useful Links'] as $value => $label)
                                            <option value="{{ $value }}"
                                                {{ old('menu_location', $data->menu_location ?? 'header') == $value ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('menu_location')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="is_main_child" class="small font-weight-bold text-dark">Menu Type</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-sitemap"></i></span>
                                    </div>
                                    <select id="is_main_child" name="is_main_child"
                                        class="form-control @error('is_main_child') is-invalid @enderror">
                                        <option value="parent_menu" {{ $selectedType == 'parent_menu' ? 'selected' : '' }}>
                                            Parent Menu</option>
                                        <option value="child_menu" {{ $selectedType == 'child_menu' ? 'selected' : '' }}>
                                            Child Menu</option>
                                    </select>
                                </div>
                                @error('is_main_child')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6" id="parentMenuWrapper"
                                style="{{ $selectedType == 'child_menu' ? '' : 'display: none;' }}">
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
                                                {{ old('parent_id', $data->parent_id ?? '') == $parentMenu->id ? 'selected' : '' }}>
                                                {{ $parentMenu->menu_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('parent_id')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">


                            <div class="form-group col-md-6">
                                <label for="external_link" class="small font-weight-bold text-dark">External Link</label>
                                <input type="url" id="external_link" name="external_link"
                                    class="form-control @error('external_link') is-invalid @enderror"
                                    value="{{ old('external_link', $data->external_link ?? '') }}"
                                    placeholder="https://example.com">
                                @error('external_link')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-section-title mt-4">
                            <h6 class="m-0 font-weight-bold text-primary">Page Content</h6>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="page_title" class="small font-weight-bold text-dark">Page Title</label>
                                <input type="text" id="page_title" name="page_title"
                                    class="form-control @error('page_title') is-invalid @enderror"
                                    value="{{ old('page_title', $data->page_title ?? '') }}"
                                    placeholder="Enter page title">
                                @error('page_title')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="slug" class="small font-weight-bold text-dark">Slug</label>
                                <input type="text" id="slug" name="slug"
                                    class="form-control @error('slug') is-invalid @enderror"
                                    value="{{ old('slug', $data->slug ?? '') }}" placeholder="auto-generated-if-empty">
                                @error('slug')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="description" class="small font-weight-bold text-dark">Short
                                    Description</label>
                                <textarea id="description" name="description" rows="5"
                                    class="form-control @error('description') is-invalid @enderror" placeholder="Write short description">{{ old('description', $data->description ?? '') }}</textarea>
                                @error('description')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="content" class="small font-weight-bold text-dark">Content</label>
                                <textarea id="content" name="content" rows="5" class="form-control @error('content') is-invalid @enderror"
                                    placeholder="Write page content">{{ old('content', $data->content ?? '') }}</textarea>
                                @error('content')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-section-title mt-4">
                            <h6 class="m-0 font-weight-bold text-primary">Media & Status</h6>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="banner_image" class="small font-weight-bold text-dark">Banner Image</label>
                                <div class="custom-file">
                                    <input type="file" id="banner_image" name="banner_image"
                                        class="custom-file-input @error('banner_image') is-invalid @enderror"
                                        accept="image/*">
                                    <label class="custom-file-label" for="banner_image">Choose banner image...</label>
                                </div>
                                @if (isset($data) && $data->banner_image)
                                    <small class="text-muted d-block mt-2">Current: {{ $data->banner_image }}</small>
                                @endif
                                @error('banner_image')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="image" class="small font-weight-bold text-dark">Menu Image</label>
                                <div class="custom-file">
                                    <input type="file" id="image" name="image"
                                        class="custom-file-input @error('image') is-invalid @enderror" accept="image/*">
                                    <label class="custom-file-label" for="image">Choose menu image...</label>
                                </div>
                                @if (isset($data) && $data->image)
                                    <small class="text-muted d-block mt-2">Current: {{ $data->image }}</small>
                                @endif
                                @error('image')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <div class="custom-control custom-switch custom-control-lg">
                                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active"
                                    value="1"
                                    {{ old('is_active', isset($data) ? $data->is_active : true) ? 'checked' : '' }}>
                                <label class="custom-control-label font-weight-bold" for="is_active">Publish
                                    Status</label>
                                <p class="small text-muted">Toggle to make this menu visible on the website.</p>
                            </div>
                        </div>

                        <div class="form-actions mt-5 border-top pt-4">
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
            const typeSelect = document.getElementById('is_main_child');
            const parentWrapper = document.getElementById('parentMenuWrapper');
            const parentSelect = document.getElementById('parent_id');
            const isChild = typeSelect.value === 'child_menu';

            parentWrapper.style.display = isChild ? '' : 'none';
            if (!isChild) {
                parentSelect.value = '';
            }
        }

        document.getElementById('is_main_child').addEventListener('change', toggleParentMenuField);

        document.querySelectorAll('.custom-file-input').forEach(function(input) {
            input.addEventListener('change', function() {
                const fileName = input.files.length ? input.files[0].name : 'Choose file...';
                input.nextElementSibling.textContent = fileName;
            });
        });
    </script>
@endpush
