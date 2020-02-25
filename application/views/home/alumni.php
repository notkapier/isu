

                <!-- Section: Magazine v.1 -->
                <section class="magazine-section " style="min-height:274px;">

                    <!-- Section heading -->
                    <!-- Section description -->
                    <!-- Grid row -->
                    
                    <?php $this->load->view('home/title');?>
                    <div class="row px-4">
                        <div class="col-sm-12">
                        <table id="tablex" class="table table-borderless table-sm" style="padding:0px;margin:0px;border:none;">
                            <thead>
                                <tr>
                                    <th>Year and Course</th>
                                    <th>Fullname</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($alumni as $row){?>
                                <tr>
                                    <th><?php echo $row->year_graduated?> - <?php $course = explode("-",$row->course); echo $course[0];?></th>
                                    <th><?php echo $row->fullname;?></th>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <!-- Grid row -->

                </section>
                <!-- Section: Magazine v.1 -->

            </section>

        </div>