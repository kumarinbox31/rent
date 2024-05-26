  <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Add Property
                <small class="text-muted"></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-primary btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="/admin"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Property</a></li>
                    <li class="breadcrumb-item active">Add Property</li>
                </ul>                
            </div>
        </div>
    </div>
    <form method="POST" action="" enctype="multipart/form-data">
    <div class="container-fluid">
        <?php
            if($msg = $this->session->flashdata('success_msg')){
                echo '<div class="alert alert-success">'.$msg.'</div>';
            }
            if($msg = $this->session->flashdata('error_msg')){
                echo '<div class="alert alert-danger">'.$msg.'</div>';
            }
            
        ?>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Basic</strong> Information  </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Property Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="location" class="form-control" placeholder="Property Location">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" name="desc" class="form-control no-resize" placeholder="Property Description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            
                <div class="card">
                    <div class="header">
                        <h2><strong>General</strong> Amenities
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="checkbox inlineblock m-r-20">
                                    <input name="other[]" value="Swimming pool" id="checkbox21" type="checkbox">
                                    <label for="checkbox21">Swimming pool</label>
                                </div>
                                <div class="checkbox inlineblock m-r-20">
                                    <input name="other[]" value="Terrace" id="checkbox22" type="checkbox">
                                    <label for="checkbox22">Terrace</label>
                                </div>
                                <div class="checkbox inlineblock m-r-20">
                                    <input name="other[]" value="Air conditioning" id="checkbox23" type="checkbox" >
                                    <label for="checkbox23">Air conditioning</label>
                                </div>
                                <div class="checkbox inlineblock m-r-20">
                                    <input name="other[]" value="Internet" id="checkbox24" type="checkbox" >
                                    <label for="checkbox24">Internet</label>
                                </div>
                                <div class="checkbox inlineblock m-r-20">
                                    <input name="other[]" value="Balcony" id="checkbox25" type="checkbox">
                                    <label for="checkbox25">Balcony</label>
                                </div>
                                <div class="checkbox inlineblock m-r-20">
                                    <input name="other[]" value="Cable TV" id="checkbox26" type="checkbox">
                                    <label for="checkbox26">Cable TV</label>
                                </div>
                                <div class="checkbox inlineblock m-r-20">
                                    <input name="other[]" value="Computer" id="checkbox27" type="checkbox">
                                    <label for="checkbox27">Computer</label>
                                </div>
                                <div class="checkbox inlineblock m-r-20">
                                    <input name="other[]" value="Dishwasher" id="checkbox28" type="checkbox" >
                                    <label for="checkbox28">Dishwasher</label>
                                </div>
                                <div class="checkbox inlineblock m-r-20">
                                    <input name="other[]" value="Near Green Zone" id="checkbox29" type="checkbox" >
                                    <label for="checkbox29">Near Green Zone</label>
                                </div>
                                <div class="checkbox inlineblock m-r-20">
                                    <input name="other[]" value="Near Church" id="checkbox30" type="checkbox">
                                    <label for="checkbox30">Near Church</label>
                                </div>
                                <div class="checkbox inlineblock m-r-20">
                                    <input name="other[]" value="Near Estate" id="checkbox31" type="checkbox">
                                    <label for="checkbox31">Near Estate</label>
                                </div>
                                <div class="checkbox inlineblock m-r-20">
                                    <input name="other[]" value="Cofee pot" id="checkbox32" type="checkbox">
                                    <label for="checkbox32">Cofee pot</label>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">                            
                            <div class="col-sm-12">
                                <input name="image" type="file"  />
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" name="action" value="add-property" class="btn btn-primary btn-round">Submit</button>
                                <button type="reset" class="btn btn-default btn-round btn-simple">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>