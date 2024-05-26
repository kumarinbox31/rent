  <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Add Tenant
                <small class="text-muted"></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-primary btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="/admin"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Room</a></li>
                    <li class="breadcrumb-item active">Add Tenant</li>
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
                                    <select class="form-control select2" onchange="getAvailableRooms(this.value)" required>
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
                                    <select class="form-control select2" name="room_id" id="rooms" required>
                                        <option value="">--Select type--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="date" name="joining_date" class="form-control" required>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="header">
                        <h2><strong>Personal Info</strong> 
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="mobile" class="form-control" placeholder="Mobile" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="number" min="0" name="age" class="form-control" placeholder="Age">
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
                                <button name="action" value="add-tenant" type="submit" class="btn btn-primary btn-round">Submit</button>
                                <a  href="" class="btn btn-default btn-round btn-simple">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
