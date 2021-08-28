@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
	<div class="content-wrapper">

		<div class="card">
			<div class="card-header">
				Edit Settings
				&nbsp;&nbsp;
				<a href="{{ route('admin.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
			<div class="card-body">		
				<form action="{{ route('admin.setting.update',1) }}" method="post" enctype="multipart/form-data">
					@csrf
                    @include('backend.partials.messages')
					<ul class="nav nav-tabs mb-2">
						<li class="nav-item">
							<a href="#general" class="nav-link active" data-toggle="tab">General</a>
						</li>
						<li class="nav-item">
							<a href="#theme" class="nav-link" data-toggle="tab">Theme</a>
						</li>
						<li class="nav-item">
							<a href="#order" class="nav-link" data-toggle="tab">Order</a>
						</li>
						<li class="nav-item">
							<a href="#social" class="nav-link" data-toggle="tab">Social</a>
						</li>
						<li class="nav-item">
							<a href="#invoice" class="nav-link" data-toggle="tab">Invoice</a>
						</li>
						<li class="nav-item">
							<a href="#product" class="nav-link" data-toggle="tab">Product</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade show active" id="general">
							<p>{{ $setting->website_name }}</p>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="website_name">Website Name</label>
										<input type="text" class="form-control" name="website_name" id="website_name"
											aria-describedby="emailHelp" value="{{ $setting->website_name }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="website_footer_text">Email</label>
										<input type="email" class="form-control" name="email" id="website_footer_text"
											aria-describedby="emailHelp" value="{{ $setting->email }}">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="website_name">Phone Number</label>
										<input type="text" class="form-control" name="phone" id="website_name"
											aria-describedby="emailHelp" value="{{ $setting->phone }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="website_footer_text">Address</label>
										<input type="text" class="form-control" name="address" id="website_footer_text"
											aria-describedby="emailHelp" value="{{ $setting->address }}">
									</div>
								</div>
								
							</div>

							<div class="form-group">
								<label for="website_footer_text">Website Footer Text</label>
								<input type="text" class="form-control" name="website_footer_text" id="website_footer_text"
									aria-describedby="emailHelp" value="{{ $setting->website_footer_text }}">
							</div>

							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label for="oldimage">Old Logo</label> <br>
			
										<img src="{!! asset('images/'.$setting->website_logo) !!}" width="100">
										<input type="hidden" value="{{ $setting->website_logo }}" name="old_logo" ><br /><br />

										<label for="image">Website Logo</label>
			
										<input type="file" class="form-control" name="website_logo" id="website_logo">
									</div>
									<div class="col-md-6">
										<label for="oldimage">Old Favicon</label> <br>
			
										<img src="{!! asset('images/'.$setting->favicon) !!}" width="100">
										<input type="hidden" value="{{ $setting->favicon }}" name="old_favicon" ><br /><br />
										
										<label for="image">Favicon</label>
			
										<input type="file" class="form-control" name="favicon" id="favicon">
									</div>
								</div>
							</div>
	
						</div>
						
						<div class="tab-pane fade" id="order">
							<div class="form-group">
								<label for="website_footer_text">Shipping Cost</label>
								<input type="number" class="form-control" name="info[order][shipping_cost]" id="website_footer_text"
									aria-describedby="emailHelp" value="{{ $settings->shipping_cost }}">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="website_footer_text">Currency Code</label>
										<input type="text" class="form-control" name="info[currency][currency_code]" id="website_footer_text"
											aria-describedby="emailHelp" value="{{ $settings->website->currency->currency_code }}">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="website_footer_text">Currency Symbol</label>
										<input type="text" class="form-control" name="info[currency][currency_symbol]" id="website_footer_text"
											aria-describedby="emailHelp" value="{{ $settings->website->currency->currency_symbol }}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="website_footer_text">Decimal</label>
										<input type="text" class="form-control" name="info[currency][activeCurrency][decimal]" id="website_footer_text"
											aria-describedby="emailHelp" value="{{ $settings->website->currency->activeCurrency->decimal }}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="website_footer_text">Decimal separator Symbol</label>
										<input type="text" class="form-control" name="info[currency][activeCurrency][decimal_separator]" id="website_footer_text"
											aria-describedby="emailHelp" value="{{ $settings->website->currency->activeCurrency->decimal_separator }}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="website_footer_text">Thousands separator Symbol</label>
										<input type="text" class="form-control" name="info[currency][activeCurrency][thousands_separator]" id="website_footer_text"
											aria-describedby="emailHelp" value="{{ $settings->website->currency->activeCurrency->thousands_separator }}">
									</div>
								</div>
							</div>
							
						</div>
						<div class="tab-pane fade" id="social">

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="website_name">Facebook</label>
										<input type="url" class="form-control" name="info[social][facebook]" id="website_name"
											aria-describedby="emailHelp" value="{{ $settings->website->social->facebook }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="website_footer_text">Twitter</label>
										<input type="url" class="form-control" name="info[social][twitter]" id="website_footer_text"
											aria-describedby="emailHelp" value="{{ $settings->website->social->twitter }}">
									</div>
								</div>	
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="website_name">Instagram</label>
										<input type="url" class="form-control" name="info[social][instagram]" id="website_name"
											aria-describedby="emailHelp" value="{{ $settings->website->social->instagram }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="website_footer_text">Linkedin</label>
										<input type="url" class="form-control" name="info[social][linkedin]" id="website_footer_text"
											aria-describedby="emailHelp" value="{{ $settings->website->social->linkedin }}">
									</div>
								</div>	
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="website_name">Pinterest</label>
										<input type="url" class="form-control" name="info[social][pinterest]" id="website_name"
											aria-describedby="emailHelp" value="{{ $settings->website->social->pinterest }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="website_footer_text">Youtube</label>
										<input type="url" class="form-control" name="info[social][youtube]" id="website_footer_text"
											aria-describedby="emailHelp" value="{{ $settings->website->social->youtube }}">
									</div>
								</div>	
							</div>
						</div>

						<div class="tab-pane fade" id="theme">
							<div class="form-group">
								<label for="status">base_theme ?</label>
								<select class="form-control" name="info[theme][base_theme]" id="status">
									<option value="default" {{ $settings->website->theme->base_theme=='default' ? 'selected' : '' }}>Default</option>
									<option value="light" {{  $settings->website->theme->base_theme=='light' ? 'selected' : '' }}>Light</option>
								</select>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="status">Enable Single Slider ?</label>
										<select class="form-control" name="info[theme][slider][single_slider]" id="status">
											<option value="true" {{ $settings->website->theme->slider->single_slider=='true' ? 'selected' : '' }}>Yes</option>
											<option value="false" {{ $settings->website->theme->slider->single_slider=='false' ? 'selected' : '' }}>No</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="status">Enable Slider Two buttons ?</label>
										<select class="form-control" name="info[theme][slider][enable_two_buttons]" id="status">
											<option value="true" {{ $settings->website->theme->slider->enable_two_buttons=='true' ? 'selected' : '' }}>Yes</option>
											<option value="false" {{  $settings->website->theme->slider->enable_two_buttons=='false' ? 'selected' : '' }}>No</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="status">Enable All Category ?</label>
										<select class="form-control" name="info[theme][header_menu][enable_all_category]" id="status">
											<option value="true" {{ $settings->website->theme->header_menu->enable_all_category=='true' ? 'selected' : '' }}>Yes</option>
											<option value="false" {{  $settings->website->theme->header_menu->enable_all_category=='false' ? 'selected' : '' }}>No</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="status">Enable Single Category ?</label>
										<select class="form-control" name="info[theme][header_menu][enable_single_category]" id="status">
											<option value="true" {{ $settings->website->theme->header_menu->enable_single_category=='true' ? 'selected' : '' }}>Yes</option>
											<option value="false" {{  $settings->website->theme->header_menu->enable_single_category=='false' ? 'selected' : '' }}>No</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="status">Button Color </label>
										<input type="color" class="form-control" name="info[theme][color][cartbtn]" id="website_name"
											aria-describedby="emailHelp" value="{{ $settings->website->theme->color->cartbtn }}" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="status">Footer Color </label>
										<input type="color" class="form-control" name="info[theme][color][footer]" id="info_color"
											aria-describedby="emailHelp" value="{{ $settings->website->theme->color->footer }}" >
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="invoice">
							<div class="form-group">
								<label for="website_footer_text">Invoice background color</label>
								<input type="color" class="form-control" name="" id="website_footer_text"
									aria-describedby="emailHelp">
							</div>
						</div>
						<div class="tab-pane fade" id="product">
							<div class="form-group">
								<label for="website_footer_text">Product Details </label>
								<input type="text" class="form-control" name="info[product][product_detail]" value="{{ $settings->product_detail }}" id="website_footer_text"
									aria-describedby="emailHelp">
							</div>
						</div>

					</div>
					<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
                    <a href="{{ route('admin.index') }}" class="btn btn-secondary"><i class="fa fa-times"></i> Cancel</a>
				</form>
			</div>
		</div>

	</div>
</div>
<!-- main-panel ends -->
@endsection