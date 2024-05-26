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
                                <select class="form-control select2" name="property_id">
                                    <option value="">-- Select Property --</option>
                                    <?php 
                                        $get = $this->db->get_where('ab_property',['user_id'=>$this->session->id]);
                                        foreach($get->result() as $row){
                                            $selected = @$property_id == $row->id ? 'selected' : '';
                                            echo '<option value="'.$row->id.'" '.$selected.'>'.$row->name.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <!--<div class="col-sm-3">-->
                            <!--    <div class="form-group m-t-5">-->
                            <!--        <input type="text" class="form-control" placeholder="Price Range">-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-sm-6">
                                <button type="submit" name="action" value="get-rooms" class="btn btn-round btn-primary waves-effect">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
        <div class="row clearfix">
            <?php 
                if(isset($rooms)){
                foreach($rooms->result() as $room){
                    $image = base_url('uploads/room/').$room->image;
                    if(file_exists(FCPATH.'uploads/room/'.$room->image) == false || $room->image == ''){
                        $image = base_url('theme/assets/images/image-gallery/1.jpg');
                    }
                    $totalCapicity = $room->capicity;
                    $currentValue = $room->value_now;
                    $per = $totalCapicity?round(($currentValue*100)/$totalCapicity):0;
                    $prog = $per == 100 ? 'success' : 'danger';
                    $prop = $this->SiteModel->getPropertyById($room->property_id)->row();
                    $typeIcon = $room->type == 'room' ? 'home' : 'shopping-cart';
            ?>
            <div class="col-lg-4 col-md-12">
                <div class="card property_list">
                    <div class="property_image">
                        <img class="img-thumbnail img-fluid" src="<?php echo $image; ?>" alt="img" style="height:200px;width:100%;">
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
                                <h5 class="text-success m-t-0 m-b-0"><i class="fa fa-inr"></i> <?=$room->price;?></h5>
                                <h4 class="m-t-0"><a href="<?php echo base_url('member/room/view/').$room->id; ?>" class="col-blue-grey"><i class="fa fa-<?=$typeIcon?>"></i> <?=$room->title;?> (<?=$room->room_no;?>)</a></h4>
                                <p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i><?=@$prop->name;?></p>
                            </div>
                            <div class="property-action m-t-15">
                                <a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard"></i><span><?=$room->capicity?></span></a>
                                <a href="#" title="Garages"><i class="zmdi zmdi-home"></i><span> <?=$room->room_type;?></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                }
                }
            ?>
        </div>
    </div>