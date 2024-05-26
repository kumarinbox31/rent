  <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Property
                <small class="text-muted"></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-primary btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="/admin"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Monthly Report</a></li>
                    <li class="breadcrumb-item active">Property</li>
                </ul>                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">List Property </div>
                <div class="card-body">
                    <table class="table table-bordered table-resposive">
                        <thead>
                            <th>Sr No</th>
                            <th>Property Name</th>
                            <th>Location</th>
                            <th>Desc</th>
                            <th>Image</th>
                            <th>General Abilities</th>
                            <!-- <th></th> -->
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                $data = $this->db->get_where('ab_property', ['status' => 1]);
                                if ($data->num_rows() > 0) {
                                    foreach ($data->result() as $row) {
                                        echo '
                                        <tr>
                                            <td>' . $i++ . '</td>
                                            <td>' . $row->name . '</td>
                                            <td>' . $row->location . '</td>
                                            <td>' . $row->desc . '</td>
                                            <td>'.$row->other.'</td>
                                            <td><img src="' . base_url('uploads/property/' . $row->image) . '" alt="' . $row->name . '" width="100"></td>
                                        </tr>';
                                    }
                                } else {
                                    echo '
                                    <tr>
                                        <td colspan="5">No properties found.</td>
                                    </tr>';
                                }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>