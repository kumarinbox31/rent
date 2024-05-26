  <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Add Room
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
                    <li class="breadcrumb-item active">Add Room</li>
                </ul>                
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <?php
            if($msg = $this->session->flashdata('success_msg')){
                echo '<div class="alert alert-success">'.$msg.'</div>';
            }
            if($msg = $this->session->flashdata('error_msg')){
                echo '<div class="alert alert-danger">'.$msg.'</div>';
            }
            
        ?>
        <form class="row clearfix" method="POST" action="" enctype="multipart/form-data">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Basic</strong> Information  </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select class="form-control select2" name="property_id" required>
                                        <option value="">--Select Property--</option>
                                        <?php 
                                            $get = $this->db->get_where('ab_property',['user_id'=>$this->session->id]);
                                            foreach($get->result() as $row){
                                                echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select class="form-control select2" name="type" required>
                                        <option value="">--Select type--</option>
                                        <option value="room">Room</option>
                                        <option value="shop">Shop</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select class="form-control select2" name="room_type" required>
                                        <option>RK</option>
                                        <option>1BHK</option>
                                        <option>2BHK</option>
                                        <option>3BHK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="number" min="0" name="room_no" class="form-control" placeholder="Room no.">
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="header">
                        <h2><strong>Other Info</strong> 
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="form-line">
                                    <input type="number" min="0" name="capicity" class="form-control" placeholder="Capicity">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="form-line">
                                    <input type="number" name="price" class="form-control" placeholder="Price">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>General</strong> Amenities
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">                            
                            <div class="col-sm-12">
                                <input name="image" type="file" />
                            </div>
                            <div class="col-sm-12">
                                <button name="action" value="add-room" type="submit" class="btn btn-primary btn-round">Submit</button>
                                <a  href="" class="btn btn-default btn-round btn-simple">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
