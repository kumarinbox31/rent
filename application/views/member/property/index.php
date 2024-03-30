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
        <!--<div class="row clearfix">-->
        <!--    <div class="col-lg-12">-->
        <!--        <div class="card">-->
        <!--            <div class="header">-->
        <!--                <h2>Search</h2>-->
        <!--            </div>-->
        <!--            <div class="body">-->
        <!--                <div class="row clearfix">-->
        <!--                    <div class="col-sm-3">-->
        <!--                        <select class="form-control select2">-->
        <!--                            <option value="">-- Select --</option>-->
        <!--                            <option value="10">Any Status</option>-->
        <!--                            <option value="20">For Sale</option>-->
        <!--                            <option value="20">For Rent</option>-->
        <!--                        </select>-->
        <!--                    </div>-->
        <!--                    <div class="col-sm-3">-->
        <!--                        <div class="form-group m-t-5">-->
        <!--                            <input type="text" class="form-control" placeholder="Price Range">-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="col-sm-6">-->
        <!--                        <button type="button" class="btn btn-round btn-primary waves-effect">Search</button>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="row clearfix">
            <?php 
                $get = $this->db->get_where('ab_property',['user_id'=>$this->session->id]);
                foreach($get->result() as $row){
                    $image = base_url('uploads/property/').$row->image;
                    if(!file_exists(FCPATH.'uploads/property/'.$row->image)){
                        $image = base_url('theme/assets/images/image-gallery/1.jpg');
                    }
                    $rooms = $this->SiteModel->getRoomsByPropertyId($row->id)->num_rows();
                    $totalCapicity = $this->SiteModel->totalRoomCapicityByProjectId($row->id);
                    $currentValue = $this->SiteModel->totalRoomCurrentValueByProjectId($row->id);
                    $per = $totalCapicity?round(($currentValue*100)/$totalCapicity):0;
                    $prog = $per == 100 ? 'success' : 'danger';
            ?>
            <div class="col-lg-4 col-md-12">
                <div class="card property_list">
                    <div class="property_image">
                        <img class="img-thumbnail img-fluid" src="<?php echo $image; ?>" alt="img" style="width:100%;height:200px;">
                        <?php 
                            if($per == 100){
                                echo '<span class="badge badge-danger">Full</span>';
                            }
                        ?>
                        <div class="progress-container progress-primary m-t-10">
                            <div class="progress">
                                <div class="progress-bar progress-bar-<?=$prog?>" role="progressbar" aria-valuenow="<?=$currentValue?>" aria-valuemin="0" aria-valuemax="<?=$totalCapicity?>" style="width: 20%;">
                                </div>
                            </div>
                        </div>
                            
                    </div>
                    <div class="body">
                        <div class="property-content">
                            <div class="detail">
                                <h4 class="m-t-0"><a href="#" class="col-blue-grey"><?=$row->name?></a></h4>
                                <p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i><?=$row->location?></p>
                                <p class="text-muted m-b-0"><?=$row->desc?></p>
                            </div>
                            <div class="property-action m-t-15">
                                <?php 
                                    $other = json_decode($row->other);
                                    foreach($other as $o){
                                        echo '<a href="#" title="'.$o.'"><span>'.$o.'</span></a>';
                                    }
                                ?>
                                
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