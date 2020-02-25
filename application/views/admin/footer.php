
</div>
    </main>
    
    <script type="text/javascript" src="http://localhost/isu//assets/js/addons/datatables.min.js"></script>
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
        $(document).on('ready', function() {    
            // $('.btn-warning').on('click',function(){
            $('#tablex tbody').on('click', '.btn-warning', function () {
                $('#dataform')[0].reset();
                $('#id').val(this.name);
                var table = $('#table').val();
                var id = this.name;
                $.ajax({
                    url: "<?php echo base_url();?>admin/getData/"+table+'-'+id,
                    dataType:"JSON",
                    type:"GET",
                    success:function(data){
                        for(var i in data){
                            var id = '#'+i;
                            if(i=='description'||i=='text'){
                                CKEDITOR.instances['content'].setData(data[i]);
                            }
                            else{
                                $('[name="'+i+'"]').val(data[i]).trigger("change");    
                            }
                            
                            console.log(id + ' iud '+ i)
                            console.log(data[i]);
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
            $('.btn-secondary').on('click',function(){
                $('#div_form').hide();
                $('#page_title').show();
                $('#div_table').fadeIn('slow');
                $('#searchbox').show();
            });
            $('#btn-add').on('click',function(){
                $('#dataform')[0].reset();
                $('#div_table').hide();
                $('#page_title').hide();
                $('#div_form').fadeIn('slow');
                $('#searchbox').hide();
            });
            
        });

        $('.btn-danger').on('click',function(){
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
    </script>
    <?php if($this->uri->segment(2)=='chart'||$this->uri->segment(2)==''||$this->uri->segment(2)=='index'){?>
        <?php for($i=1;$i<=date('d');$i++){
            $data[$i] = '"'.$i.'"';
        }
        $data = implode(',',$data)
        ;?>

        <?php for($i=1;$i<=date('d');$i++){
            foreach($visitors as $row){
                if($row->day==$i){
                    $visitor[$i] = '"'.$row->total.'"';        
                }
            }
            if(empty($visitor[$i])){
                $visitor[$i] = 0;
            }
        }
        $visitor = implode(',',$visitor)
        ;?>

        <?php for($i=1;$i<=date('d');$i++){
            foreach($registered as $row){
                if($row->day==$i){
                    $register[$i] = '"'.$row->total.'"';        
                }
            }
            if(empty($register[$i])){
                $register[$i] = 0;
            }
        }
        $register = implode(',',$register)
        ;?>

    <script>
    //line
        var ctxL = document.getElementById("lineChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
        labels: [<?php echo $data;?>],
        datasets: [{
        label: "Visitors",
        data: [<?php echo $visitor;?>],
        backgroundColor: [
        'rgba(105, 0, 132, .2)',
        ],
        borderColor: [
        'rgba(200, 99, 132, .7)',
        ],
        borderWidth: 2
        },
        {
        label: "Registered Users",
        data: [<?php echo $register;?>],
        backgroundColor: [
        'rgba(0, 137, 132, .2)',
        ],
        borderColor: [
        'rgba(0, 10, 130, .7)',
        ],
        borderWidth: 2
        }
        ]
        },
        options: {
        responsive: true
        }
        });
</script>
<?php }?>
</body>

</html>