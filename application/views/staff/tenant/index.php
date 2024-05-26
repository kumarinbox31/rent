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
    <form method="post" action="">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Search</h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <div class="form-group m-t-5">
                                    <input type="text" class="form-control" name="search" placeholder="Search by name, mobile">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" name="action" value="" class="btn btn-round btn-primary waves-effect">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
        <div class="row clearfix">
            <?php 
                $s = @$_POST['search'] ?? '';
                $this->db->like('name',$s,'both');
                $this->db->or_like('mobile',$s,'both');
                $get = $this->SiteModel->getTenant();
                foreach($get->result() as $t){
                    $image = base_url('uploads/tenant/').$t->image;
                    if(file_exists(FCPATH.'uploads/tenant/'.$t->image) == false || $t->image == ''){
                        $image = base_url('theme/assets/images/image-gallery/1.jpg');
                    }
            ?>
            <div class="col-lg-4 col-md-12">
                <div class="card property_list">
                    <div class="property_image">
                        <img class="img-thumbnail img-fluid" src="<?php echo $image; ?>" alt="img" style="height:200px;width:100%;">
                        <?php 
                            if($t->leaving_date){
                                echo '<span class="badge badge-danger">Leaved</span>';
                            }
                        ?>
                    </div>
                    <div class="body">
                        <div class="property-content">
                            <div class="detail">
                                <h5 class="text-success m-t-0 m-b-0"><?=$t->name;?></h5>
                                <ul>
                                    <li><b>Mobile: </b> <?=$t->mobile?></li>
                                    <li><b>Age: </b> <?=$t->age?></li>
                                    <li><b>Joining Date: </b> <?=date('d-m-Y',strtotime($t->joining_date))?></li>
                                </ul>
                            </div>
                            <div class="property-action m-t-15">
                                <a href="#"><i class="zmdi zmdi-eye"></i><span></span></a>
                                <a href="#"><i class="zmdi zmdi-edit"></i><span></span></a>
                                <a href="<?php echo base_url('member/delete/tenant/'.$t->id); ?>"><i class="zmdi zmdi-delete"></i><span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                }
            ?>
        </div>
    </div>