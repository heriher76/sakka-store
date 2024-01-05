@extends('backend.layouts.app')

@section('content')

    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="h3">{{ translate('Website Footer') }}</h1>
            </div>
        </div>
    </div>

    <!-- Language -->
    <ul class="nav nav-tabs nav-fill border-light">
        @foreach (get_all_active_language() as $key => $language)
            <li class="nav-item">
                <a class="nav-link text-reset @if ($language->code == $lang) active @else bg-soft-dark border-light border-left-0 @endif py-3"
                    href="{{ route('website.footer', ['lang' => $language->code]) }}">
                    <img src="{{ static_asset('assets/img/flags/' . $language->code . '.png') }}" height="11"
                        class="mr-1">
                    <span>{{ $language->name }}</span>
                </a>
            </li>
        @endforeach
    </ul>

    <!-- Footer Widget -->
    <div class="card">
        <div class="card-header">
            <h6 class="fw-600 mb-0">{{ translate('Footer Widget') }}</h6>
        </div>
        <div class="card-body">
            <div class="row gutters-10">

                <!-- Footer Info -->
                <div class="col-lg-12">
                    <div class="card shadow-none bg-light">
                        <div class="card-header">
                            <h6 class="mb-0">{{ translate('Footer Info Widget') }}</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('business_settings.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- Title -->
                                <div class="form-group">
                                    <label>{{ translate('Title') }} ({{ translate('Translatable') }})</label>
                                    <input type="hidden" name="types[][{{ $lang }}]" value="footer_title">
                                    <input type="text" class="form-control" placeholder="Footer title"
                                        name="footer_title" value="{{ get_setting('footer_title', null, $lang) }}">
                                </div>
                                <!-- About description -->
                                <div class="form-group">
                                    <label>{{ translate('Footer description') }} ({{ translate('Translatable') }})</label>
                                    <input type="hidden" name="types[][{{ $lang }}]" value="footer_description">
                                    <textarea class="form-control" name="footer_description" rows="6" placeholder="Type..">{{ get_setting('footer_description', null, $lang) }}</textarea>
                                </div>
                                <!-- Update Button -->
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- About Widget -->
                <div class="col-lg-6">
                    <div class="card shadow-none bg-light">
                        <div class="card-header">
                            <h6 class="mb-0">{{ translate('About Widget') }}</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('business_settings.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- Footer Logo -->
                                <div class="form-group">
                                    <label class="form-label" for="signinSrEmail">{{ translate('Footer Logo') }}</label>
                                    <div class="input-group " data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                {{ translate('Browse') }}</div>
                                        </div>
                                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                        <input type="hidden" name="types[]" value="footer_logo">
                                        <input type="hidden" name="footer_logo" class="selected-files"
                                            value="{{ get_setting('footer_logo') }}">
                                    </div>
                                    <div class="file-preview"></div>
                                </div>
                                <!-- About description -->
                                <div class="form-group">
                                    <label>{{ translate('About description') }} ({{ translate('Translatable') }})</label>
                                    <input type="hidden" name="types[][{{ $lang }}]" value="about_us_description">
                                    <textarea class="aiz-text-editor form-control" name="about_us_description"
                                        data-buttons='[["font", ["bold", "underline", "italic"]],["para", ["ul", "ol"]],["view", ["undo","redo"]]]'
                                        placeholder="Type.." data-min-height="150">
                                        {!! get_setting('about_us_description', null, $lang) !!}
                                    </textarea>
                                </div>
                                <!-- Play Store Link -->
                                <div class="form-group">
                                    <label>{{ translate('Play Store Link') }}</label>
                                    <input type="hidden" name="types[]" value="play_store_link">
                                    <input type="text" class="form-control" placeholder="http://" name="play_store_link"
                                        value="{{ get_setting('play_store_link') }}">
                                </div>
                                <!-- App Store Link -->
                                <div class="form-group">
                                    <label>{{ translate('App Store Link') }}</label>
                                    <input type="hidden" name="types[]" value="app_store_link">
                                    <input type="text" class="form-control" placeholder="http://" name="app_store_link"
                                        value="{{ get_setting('app_store_link') }}">
                                </div>
                                <!-- Update Button -->
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Contact Info Widget -->
                <div class="col-lg-6">
                    <div class="card shadow-none bg-light">
                        <div class="card-header">
                            <h6 class="mb-0">{{ translate('Contact Info Widget') }}</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('business_settings.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- Contact address -->
                                <div class="form-group">
                                    <label>{{ translate('Contact address') }} ({{ translate('Translatable') }})</label>
                                    <input type="hidden" name="types[][{{ $lang }}]" value="contact_address">
                                    <input type="text" class="form-control" placeholder="{{ translate('Address') }}"
                                        name="contact_address" value="{{ get_setting('contact_address', null, $lang) }}">
                                </div>
                                <!-- Contact phone -->
                                <div class="form-group">
                                    <label>{{ translate('Contact phone') }}</label>
                                    <input type="hidden" name="types[]" value="contact_phone">
                                    <input type="text" class="form-control" placeholder="{{ translate('Phone') }}"
                                        name="contact_phone" value="{{ get_setting('contact_phone') }}">
                                </div>
                                <!-- Contact email -->
                                <div class="form-group">
                                    <label>{{ translate('Contact email') }}</label>
                                    <input type="hidden" name="types[]" value="contact_email">
                                    <input type="text" class="form-control" placeholder="{{ translate('Email') }}"
                                        name="contact_email" value="{{ get_setting('contact_email') }}">
                                </div>
                                <!-- Update Button -->
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Link Widget One -->
                <div class="col-lg-12">
                    <div class="card shadow-none bg-light">
                        <div class="card-header">
                            <h6 class="mb-0">{{ translate('Link Widget One') }}</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('business_settings.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- Title -->
                                <div class="form-group">
                                    <label>{{ translate('Title') }} ({{ translate('Translatable') }})</label>
                                    <input type="hidden" name="types[][{{ $lang }}]" value="widget_one">
                                    <input type="text" class="form-control" placeholder="Widget title"
                                        name="widget_one" value="{{ get_setting('widget_one', null, $lang) }}">
                                </div>
                                <!-- Links -->
                                <div class="form-group">
                                    <label>{{ translate('Links') }} - ({{ translate('Translatable') }}
                                        {{ translate('Label') }})</label>
                                    <div class="w3-links-target">
                                        <input type="hidden" name="types[][{{ $lang }}]"
                                            value="widget_one_labels">
                                        <input type="hidden" name="types[]" value="widget_one_links">
                                        @if (get_setting('widget_one_labels', null, $lang) != null)
                                            @foreach (json_decode(get_setting('widget_one_labels', null, $lang), true) as $key => $value)
                                                @php
                                                    $widget_one_links = '';
                                                    if (isset(json_decode(get_setting('widget_one_links'), true)[$key])) {
                                                        $widget_one_links = json_decode(get_setting('widget_one_links'), true)[$key];
                                                    }
                                                @endphp
                                                <div class="row gutters-5">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="{{ translate('Label') }}"
                                                                name="widget_one_labels[]" value="{{ $value }}">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="http://" name="widget_one_links[]"
                                                                value="{{ $widget_one_links }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="button"
                                                            class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger"
                                                            data-toggle="remove-parent" data-parent=".row">
                                                            <i class="las la-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-soft-secondary btn-sm" data-toggle="add-more"
                                        data-content='<div class="row gutters-5">
    										<div class="col-4">
    											<div class="form-group">
    												<input type="text" class="form-control" placeholder="{{ translate('Label') }}" name="widget_one_labels[]">
    											</div>
    										</div>
    										<div class="col">
    											<div class="form-group">
    												<input type="text" class="form-control" placeholder="http://" name="widget_one_links[]">
    											</div>
    										</div>
    										<div class="col-auto">
    											<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
    												<i class="las la-times"></i>
    											</button>
    										</div>
    									</div>'
                                        data-target=".w3-links-target">
                                        {{ translate('Add New') }}
                                    </button>
                                </div>
                                <!-- Update Button -->
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="card">
        <div class="card-header">
            <h6 class="fw-600 mb-0">{{ translate('Footer Bottom') }}</h6>
        </div>
        <form action="{{ route('business_settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <!-- Copyright Widget -->
                <div class="card shadow-none bg-light">
                    <div class="card-header">
                        <h6 class="mb-0">{{ translate('Copyright Widget ') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ translate('Copyright Text') }} ({{ translate('Translatable') }})</label>
                            <input type="hidden" name="types[][{{ $lang }}]" value="frontend_copyright_text">
                            <textarea class="aiz-text-editor form-control" name="frontend_copyright_text"
                                data-buttons='[["font", ["bold", "underline", "italic"]],["insert", ["link"]],["view", ["undo","redo"]]]'
                                placeholder="Type.." data-min-height="150">
                                {!! get_setting('frontend_copyright_text', null, $lang) !!}
                            </textarea>
                        </div>
                    </div>
                </div>

                <!-- Social Link Widget -->
                <div class="card shadow-none bg-light">
                    <div class="card-header">
                        <h6 class="mb-0">{{ translate('Social Link Widget ') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-from-label">{{ translate('Show Social Links?') }}</label>
                            <div class="col-md-9">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input type="hidden" name="types[]" value="show_social_links">
                                    <input type="checkbox" name="show_social_links"
                                        @if (get_setting('show_social_links') == 'on') checked @endif>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ translate('Social Links') }}</label>
                            <!-- Facebook Link -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="lab la-facebook-f"></i></span>
                                </div>
                                <input type="hidden" name="types[]" value="facebook_link">
                                <input type="text" class="form-control" placeholder="http://" name="facebook_link"
                                    value="{{ get_setting('facebook_link') }}">
                            </div>
                            <!-- Twitter Link -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="lab la-twitter"></i></span>
                                </div>
                                <input type="hidden" name="types[]" value="twitter_link">
                                <input type="text" class="form-control" placeholder="http://" name="twitter_link"
                                    value="{{ get_setting('twitter_link') }}">
                            </div>
                            <!-- Instagram Link -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="lab la-instagram"></i></span>
                                </div>
                                <input type="hidden" name="types[]" value="instagram_link">
                                <input type="text" class="form-control" placeholder="http://" name="instagram_link"
                                    value="{{ get_setting('instagram_link') }}">
                            </div>
                            <!-- Youtube Link -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="lab la-youtube"></i></span>
                                </div>
                                <input type="hidden" name="types[]" value="youtube_link">
                                <input type="text" class="form-control" placeholder="http://" name="youtube_link"
                                    value="{{ get_setting('youtube_link') }}">
                            </div>
                            <!-- Linkedin Link -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="lab la-linkedin-in"></i></span>
                                </div>
                                <input type="hidden" name="types[]" value="linkedin_link">
                                <input type="text" class="form-control" placeholder="http://" name="linkedin_link"
                                    value="{{ get_setting('linkedin_link') }}">
                            </div>
                            <!-- Whatsapp Link -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="lab la-whatsapp"></i></span>
                                </div>
                                <input type="hidden" name="types[]" value="whatsapp_link">
                                <input type="text" class="form-control"
                                    placeholder="https://api.whatsapp.com/send?phone=" name="whatsapp_link"
                                    value="{{ get_setting('whatsapp_link') }}">
                            </div>
                            <!-- Shopee Link -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                            width="18" height="18" viewBox="0 0 48 68">
                                            <path fill="#f4511e"
                                                d="M36.683,43H11.317c-2.136,0-3.896-1.679-3.996-3.813l-1.272-27.14C6.022,11.477,6.477,11,7.048,11 h33.904c0.571,0,1.026,0.477,0.999,1.047l-1.272,27.14C40.579,41.321,38.819,43,36.683,43z">
                                            </path>
                                            <path fill="#f4511e"
                                                d="M32.5,11.5h-2C30.5,7.364,27.584,4,24,4s-6.5,3.364-6.5,7.5h-2C15.5,6.262,19.313,2,24,2 S32.5,6.262,32.5,11.5z">
                                            </path>
                                            <path fill="#fafafa"
                                                d="M24.248,25.688c-2.741-1.002-4.405-1.743-4.405-3.577c0-1.851,1.776-3.195,4.224-3.195 c1.685,0,3.159,0.66,3.888,1.052c0.124,0.067,0.474,0.277,0.672,0.41l0.13,0.087l0.958-1.558l-0.157-0.103 c-0.772-0.521-2.854-1.733-5.49-1.733c-3.459,0-6.067,2.166-6.067,5.039c0,3.257,2.983,4.347,5.615,5.309 c3.07,1.122,4.934,1.975,4.934,4.349c0,1.828-2.067,3.314-4.609,3.314c-2.864,0-5.326-2.105-5.349-2.125l-0.128-0.118l-1.046,1.542 l0.106,0.087c0.712,0.577,3.276,2.458,6.416,2.458c3.619,0,6.454-2.266,6.454-5.158C30.393,27.933,27.128,26.741,24.248,25.688z">
                                            </path>
                                        </svg></span>
                                </div>
                                <input type="hidden" name="types[]" value="shopee_link">
                                <input type="text" class="form-control" placeholder="http://" name="shopee_link"
                                    value="{{ get_setting('shopee_link') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Download App Link -->
                @if (get_setting('vendor_system_activation') == 1 || addon_is_activated('delivery_boy'))
                    <div class="card shadow-none bg-light">
                        <div class="card-header">
                            <h6 class="mb-0">{{ translate('Download App Link') }}</h6>
                        </div>
                        <div class="card-body">
                            <!-- Seller App Link -->
                            @if (get_setting('vendor_system_activation') == 1)
                                <div class="form-group">
                                    <label>{{ translate('Seller App Link') }}</label>
                                    <div class="input-group form-group">
                                        <input type="hidden" name="types[]" value="seller_app_link">
                                        <input type="text" class="form-control" placeholder="http://"
                                            name="seller_app_link" value="{{ get_setting('seller_app_link') }}">
                                    </div>
                                </div>
                            @endif
                            <!-- Delivery Boy App Link -->
                            @if (addon_is_activated('delivery_boy'))
                                <div class="form-group">
                                    <label>{{ translate('Delivery Boy App Link') }}</label>
                                    <div class="input-group form-group">
                                        <input type="hidden" name="types[]" value="delivery_boy_app_link">
                                        <input type="text" class="form-control" placeholder="http://"
                                            name="delivery_boy_app_link"
                                            value="{{ get_setting('delivery_boy_app_link') }}">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Payment Methods Widget -->
                <div class="card shadow-none bg-light">
                    <div class="card-header">
                        <h6 class="mb-0">{{ translate('Payment Methods Widget ') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ translate('Payment Methods') }}</label>
                            <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                        {{ translate('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="types[]" value="payment_method_images">
                                <input type="hidden" name="payment_method_images" class="selected-files"
                                    value="{{ get_setting('payment_method_images') }}">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Update Button -->
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
