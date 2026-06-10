@extends('layouts.admin')
@section('title', 'Site Settings')
@section('page-title', 'Site Settings')
@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                <div class="col-12"><h6 class="text-maroon border-bottom pb-2">College Information</h6></div>
                <div class="col-md-8">
                    <label class="form-label">College Name <span class="text-danger">*</span></label>
                    <input type="text" name="college_name" class="form-control" value="{{ old('college_name', $settings->get('college_name')?->value ?? "K.T.S.P.M's Law College, Khopoli") }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tagline</label>
                    <input type="text" name="college_tagline" class="form-control" value="{{ old('college_tagline', $settings->get('college_tagline')?->value) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" rows="2">{{ old('address', $settings->get('address')?->value) }}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $settings->get('phone')?->value) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $settings->get('email')?->value) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">WhatsApp Number</label>
                    <input type="text" name="whatsapp_number" class="form-control" value="{{ old('whatsapp_number', $settings->get('whatsapp_number')?->value) }}" placeholder="9876543210">
                </div>

                <div class="col-12"><h6 class="text-maroon border-bottom pb-2">Branding</h6></div>
                <div class="col-md-6">
                    <label class="form-label">College Logo</label>
                    @if($settings->get('logo')?->value) <img src="{{ asset('storage/'.$settings->get('logo')->value) }}" style="height:60px" class="mb-2 d-block"> @endif
                    <input type="file" name="logo" class="form-control" accept="image/*">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Favicon</label>
                    @if($settings->get('favicon')?->value) <img src="{{ asset('storage/'.$settings->get('favicon')->value) }}" style="height:32px" class="mb-2 d-block"> @endif
                    <input type="file" name="favicon" class="form-control" accept="image/*">
                </div>

                <div class="col-12"><h6 class="text-maroon border-bottom pb-2">Social Media</h6></div>
                <div class="col-md-6">
                    <label class="form-label"><i class="fab fa-facebook text-primary me-1"></i>Facebook URL</label>
                    <input type="url" name="facebook_url" class="form-control" value="{{ old('facebook_url', $settings->get('facebook_url')?->value) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label"><i class="fab fa-instagram text-danger me-1"></i>Instagram URL</label>
                    <input type="url" name="instagram_url" class="form-control" value="{{ old('instagram_url', $settings->get('instagram_url')?->value) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label"><i class="fab fa-youtube text-danger me-1"></i>YouTube URL</label>
                    <input type="url" name="youtube_url" class="form-control" value="{{ old('youtube_url', $settings->get('youtube_url')?->value) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label"><i class="fab fa-twitter text-info me-1"></i>Twitter URL</label>
                    <input type="url" name="twitter_url" class="form-control" value="{{ old('twitter_url', $settings->get('twitter_url')?->value) }}">
                </div>

                <div class="col-12"><h6 class="text-maroon border-bottom pb-2">Google Map</h6></div>
                <div class="col-12">
                    <label class="form-label">Google Map Embed Code</label>
                    <textarea name="google_map_embed" class="form-control" rows="3" placeholder="<iframe src=...></iframe>">{{ old('google_map_embed', $settings->get('google_map_embed')?->value) }}</textarea>
                </div>

                <div class="col-12"><h6 class="text-maroon border-bottom pb-2">Website Content</h6></div>
                <div class="col-12">
                    <label class="form-label">About College (Short — for footer)</label>
                    <textarea name="about_short" class="form-control" rows="2">{{ old('about_short', $settings->get('about_short')?->value) }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Footer Text</label>
                    <input type="text" name="footer_text" class="form-control" value="{{ old('footer_text', $settings->get('footer_text')?->value) }}">
                </div>
                <div class="col-12">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="admission_open" value="1" {{ $settings->get('admission_open')?->value ? 'checked' : '' }}>
                        <label class="form-check-label">Show "Admissions Open" Banner on Website</label>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-lg" style="background:var(--primary);color:#fff"><i class="fas fa-save me-2"></i>Save All Settings</button>
            </div>
        </form>
    </div>
</div>
@endsection
