@extends('backend.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Banner Management</h1>
        <a href="{{ route('banner.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-list fa-sm text-white-50 mr-2"></i> View List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4 border-left-primary">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{ isset($data) ? 'Edit Banner: ' . $data->name : 'Create New Banner' }}
                    </h6>
                </div>
                
                @if (isset($data))
                    <form action="{{ route('banner.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                @else
                    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                @endif
                    @csrf
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 text-center border-right">
                                <label class="font-weight-bold text-dark d-block mb-3">Banner Image</label>
                                
                                <div class="mb-3">
                                    <div id="imagePreviewContainer" class="border rounded p-2 bg-light d-flex align-items-center justify-content-center" style="min-height: 200px; position: relative;">
                                        @php 
                                            $hasImage = isset($data) && $data->image;
                                        @endphp
                                        <img id="previewImg" 
                                             src="{{ $hasImage ? asset('storage/' . $data->image) : asset('backend/img/placeholder.jpg') }}" 
                                             alt="Preview" 
                                             class="img-fluid rounded shadow-sm" 
                                             style="max-height: 180px; {{ $hasImage ? '' : 'opacity: 0.5;' }}">
                                        
                                        
                                    </div>
                                </div>

                                <div class="custom-file text-left">
                                    <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image" accept="image/*" onchange="previewImage(event)">
                                    <label class="custom-file-label" for="image">Choose file...</label>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <small class="text-muted mt-2 d-block">Recommended size: 1920x1080px</small>
                            </div>

                            <div class="col-lg-8">
                                <div class="form-group mb-4">
                                    <label for="name" class="font-weight-bold text-dark">Banner Title / Name</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control form-control-user @error('name') is-invalid @enderror"
                                        placeholder="Enter descriptive banner name..." 
                                        value="{{ isset($data) ? $data->name : old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-control-lg">
                                        <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1"
                                            {{ (isset($data) && $data->is_active) || old('is_active') ? 'checked' : '' }}>
                                        <label class="custom-control-label font-weight-bold" for="is_active">
                                            Publish Status
                                        </label>
                                        <p class="small text-muted">Toggle to make this banner visible on the website front-end.</p>
                                    </div>
                                </div>

                                <hr>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary btn-icon-split shadow-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-save"></i>
                                        </span>
                                        <span class="text">{{ isset($data) ? 'Update Changes' : 'Save Banner' }}</span>
                                    </button>
                                    <a href="{{ route('banner.index') }}" class="btn btn-light btn-icon-split ml-2">
                                        <span class="text">Cancel</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const previewImg = document.getElementById('previewImg');
        const placeholder = document.getElementById('placeholderText');
        const fileName = event.target.value.split('\\').pop();
        
       
        event.target.nextElementSibling.innerText = fileName;

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewImg.style.opacity = "1";
                placeholder.classList.add('d-none');
            };
            reader.readAsDataURL(file);
        }
    }
</script>
<style>
 
    .custom-control-label { cursor: pointer; }
    .btn-icon-split .text { padding: 0.375rem 0.75rem; }
</style>
@endpush