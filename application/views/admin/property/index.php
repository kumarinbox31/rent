<div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Property List
                <small class="text-muted"></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <a href="<?php echo base_url('admin/property/add'); ?>" class="btn btn-primary btn-icon btn-round hidden-sm-down float-right m-l-10" style="margin-top:10px;">
                    <i class="zmdi zmdi-plus"></i>
                </a>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="/admin"><i class="zmdi zmdi-home"></i> </a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Property</a></li>
                    <li class="breadcrumb-item active">List</li>
                </ul>                
            </div>
        </div>
    </div>
<div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Search</h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <select class="form-control select2">
                                    <option value="">-- Select --</option>
                                    <option value="10">Any Status</option>
                                    <option value="20">For Sale</option>
                                    <option value="20">For Rent</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group m-t-5">
                                    <input type="text" class="form-control" placeholder="Price Range">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-round btn-primary waves-effect">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card property_list">
                    <div class="property_image">
                        <img class="img-thumbnail img-fluid" src="<?php echo base_url('theme/'); ?>assets/images/image-gallery/1.jpg" alt="img">
                        <span class="badge badge-danger">Full</span>
                    </div>
                    <div class="body">
                        <div class="property-content">
                            <div class="detail">
                                <h5 class="text-success m-t-0 m-b-0">$390,000 - $430,000</h5>
                                <h4 class="m-t-0"><a href="#" class="col-blue-grey">4BHK Alexander Court,New York</a></h4>
                                <p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i>245 E 20th St, New York, NY 201609</p>
                                <p class="text-muted m-b-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit Aliquam gravida magna et fringilla convallis. Pellentesque habitant morb</p>
                            </div>
                            <div class="property-action m-t-15">
                                <a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard"></i><span>280</span></a>
                                <a href="#" title="Bedroom"><i class="zmdi zmdi-hotel"></i><span>4</span></a>
                                <a href="#" title="Parking space"><i class="zmdi zmdi-car-taxi"></i><span>2</span></a>
                                <a href="#" title="Garages"><i class="zmdi zmdi-home"></i><span> 24H</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>