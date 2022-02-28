<div id="products">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-3">
            	<div id="bar-left">
				{%products_filters%}
                </div>
            </div>
            
        	<div id="area-products" class="col-sm-9">
            	<div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        {%head_table_product_list%} 
                        </thead>
                        <tbody>
                        {%table_product_list%}
                        </tbody>
                    </table>
				</div>
         		
                <div id="products-pagination">
                	{%pagination_products%}
    			</div>
                
                <div style="margin-bottom:50px;"></div>
            
            </div>
        </div>
    </div>
</div>
<script>
$( document ).ready(function() {
	$('#area-products tbody tr').click(function(){
		window.location = $(this).attr("data-href");
	});
});
</script>