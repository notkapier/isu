</div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer class="page-footer font-small red darken-4 pt-4 mt-4">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">

                    <!-- Content -->
                    <h5 class="styled">Isabela State University</h5>
                    <p class="styled">Cabagan, Isabela</hp>
                        <p class="styled" style="font-size:12px;">College of Computing Studies, Information, Communication and Technology</p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase styled">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase styled">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!" class="">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="text-center py-3">© 2018 Copyright:
            <a href="https://mdbootstrap.com/bootstrap-tutorial/"> MDBootstrap.com</a>
        </div>
        <!-- Copyright -->

       

    </footer>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/js/addons/datatables.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script>
        $('#tablex').dataTable({
             
                "lengthChange":false,
                "ordering": false,
                "dom": '<"pull-right"f>tip<"pull-left"l>',
                // "dom": '<"pull-right"f>tip<"pull-left"l>',
                "searching": true,
                "info": false,
                "pageLength": 5,
                "language": { search: '', searchPlaceholder: "Search..." },
                "columnDefs": [ {
                  "targets": 1,
                  "createdCell": function (td, cellData, rowData, row, col) {
                    if ( cellData < 1 ) {
                      $(td).css('color', 'red')
                    }
                  }
                } ],
                initComplete : function() {
                $("#tablex_filter").detach().appendTo('#searchbox');
            }

        });
    </script>
    <script type="text/javascript" src="http://localhost/vtour/assets/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="http://localhost/vtour/assets/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="http://localhost/vtour/assets/js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>
    <?php if(($this->uri->segment(2)=="") || ($this->uri->segment(2)=="index")){?>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-2.2.js"></script>
    <?php }?>
    

    
    
    <script src="http://localhost/vtour/assets/plugin/slick/slick.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).on('ready', function() {
       
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                // fade: true,
                autoplay: true,
                /* this is the new line */
                autoplaySpeed: 2000,
                infinite: true,
                dots: true,
            });

        });
         
    </script>

    <script>
        $('.library').on('click',function(){
            var id = this.id;
            var url = "<?php echo base_url('home/digitallibrary/')?>";
            ajax_request(id,url);

        });
        $('.traccer_type').on('click',function(){
            var id = this.id;
            var url = "<?php echo base_url('home/traccer/')?>";
            ajax_request(id,url);

        });

        function ajax_request(id,url){
            $.ajax({
                dataType:'HTML',
                type: 'GET',
                url: url +id,
                success:function(data){
                    $('#tablex').DataTable().clear().destroy();
                    $("#table_container").html(data);
                    $('#tablex').dataTable({
                        "destroy" :true,
                        "lengthChange":false,
                        "ordering": false,
                        "dom": '<"pull-right"f>tip<"pull-left"l>',
                        // "dom": '<"pull-right"f>tip<"pull-left"l>',
                        "searching": true,
                        "info": false,
                        "pageLength": 5,
                        "language": { search: '', searchPlaceholder: "Search..." },
                        "columnDefs": [ {
                          "targets": 1,
                          "createdCell": function (td, cellData, rowData, row, col) {
                            if ( cellData < 1 ) {
                              $(td).css('color', 'red')
                            }
                          }
                        } ],
                        initComplete : function() {
                        $('#searchbox').empty();
                        $("#tablex_filter").detach().appendTo('#searchbox');
                    }

                });


                },
                error: function(jqXHR, errorThrown, textStatus){

                },
            });
        }

        $('.about_tab').on('click',function(){
            var id = this.id;
            $.ajax({
                url: "<?php echo base_url('home/aboutus/')?>"+id,
                type:"GET",
                dataType:"JSON",
                success:function(data){
                    // console.log(data.id);
                    $('#about_tab').text(data.about_tab);
                    $("#image").attr("src", data.image);
                    $('#description').empty().append('\''+data.description+'\'');
                },
                error: function(jqXHR, errorThrown, textStatus){

                },
            });
        });

        $('#btn-add').on('click',function(){
                $('#dataform')[0].reset();
                $('#div_table').hide();
                $('#page_title').hide();
                $('#div_form').fadeIn('slow');
                $('#searchbox').hide();
            });
        $('.btn-secondary').on('click',function(e){
                e.preventDefault();
                $('#div_form').hide();
                $('#page_title').show();
                $('#div_table').fadeIn('slow');
                $('#searchbox').show();
            });

        function save() {

        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var formData = new FormData($('#dataform')[0]);
        var formType = $('#dataform').attr('type');
        $.ajax({
            url: "<?php echo site_url('admin/');?>"+formType,

            type: "POST",
            data: $('#dataform').serialize(),
            dataType: "JSON",
            function(data) {
                //if success close modal and reload ajax table
                $('#formx').fadeOut('slow');
                $('#dtable').fadeIn('slow');

                // location.reload();// for reload a page
            },
            error: function(jqXHR, textStatus, errorThrown) {

            }
        });

    };

    $('#tablex tbody').on('click', '.btn-warning', function () {
        $('#dataform')[0].reset();
        $('#id').val(this.name);
        var table = $('#table').val();
        var id = this.name;
        $.ajax({
            url: "<?php echo base_url();?>home/getData/"+table+'-'+id,
            dataType:"JSON",
            type:"GET",
            success:function(data){
                for(var i in data){
                    var id = '#'+i;
                    if(i=='description'||i=='text'||i=='question'||i=='answer'){
                        CKEDITOR.instances['content'].setData(data[i]);
                    }
                    else{
                        $('[name="'+i+'"]').val(data[i]).trigger("change");    
                    }
                    
                    // console.log(id + ' iud '+ i)
                    // console.log(data[i]);
                }
            },
            error: function(jqXHR, errorThrown, textStatus){
                alert("error");
            }
        })
        $('#div_table').hide();
        $('#page_title').hide();
        $('#div_form').fadeIn('slow');
        $('#searchbox').hide();
    });
    $('#tablex tbody').on('click', '.btn-delete', function () {
    // $('.btn-delete').on('click',function(){
            var id = this.name;
            swal({
                title: "Delete this Item?",
                text: "You cannot retrieve this once deleted!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function(isConfirm) {
                if (!isConfirm) return;
                $.ajax({
                    url: "<?php echo site_url('admin/deleteData')?>/",
                    type: "POST",
                    data: {
                        id: id,
                        table: $('#table').val(),
                    },
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data);
                        location.reload();
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal("Error deleting!", "Please try again", "error");
                    }
                });
            });
        });
    </script>



</body>

</html>