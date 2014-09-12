<div id="content"  style="min-height:400px;"> 
	<div class="frametab">
		<a href="<?php echo base_url();?>index.php/admin/content_add_page"><button style="margin:10px; float:right;padding: 4px 5px;">Tambah Konten</button></a>
		<h3 style="margin:5px 0 5px 5px;">Daftar Semua Kategori</h3>
		<div id="list"></div>
	</div>
	<div id="end"></div>
  <!--&content--> 
</div>
<script>
	$( window ).load(function() {
		load_contents();
	})
	
	function load_contents(){
		var data = [];
		$.ajax({
			type : "GET",
			async: false,
			url: '<?php echo base_url();?>index.php/admin/get_posts',
			dataType: "json",
			success:function(datajson){
				for(var i=0; i<datajson.length;i++)
					data[i] = {number_row: datajson[i].number_row, id:datajson[i].id, category:datajson[i].category, title: datajson[i].title, is_promo: datajson[i].is_promo, price: datajson[i].price, author: datajson[i].author, status: datajson[i].status, enabled: datajson[i].enabled};
			}
		});
		
		YUI({gallery: 'gallery-2013.01.09-23-24'}).use('datatable','datatable-sort','datatype-number','datatype-date','datatable-paginator', function (Y) {
			/*------------------------------------*/
			var data_user = data;
			var table = new Y.DataTable({
				columns: [
					{key:"number_row", label:"No.", width:"60px"},
					{key:"category", label:"Kategori"},
					{key:"title", label:"Judul"},
					{label:"Promo?",
						nodeFormatter:function(o){
							if(o.data.is_promo=="true")
								o.cell.set('text', 'Ya');
							else
								o.cell.set('text', 'Tidak');
						}
					},
					{key:"price", label:"Harga"},
					{key:"author", label:"Penulis"},
					{key:"status", label:"Status"},
					{label:"Ditampilkan?",
						nodeFormatter:function(o){
							if(o.data.enabled=="true")
								o.cell.set('text', 'Ya');
							else
								o.cell.set('text', 'Tidak');
						}
					},
					{
						key:"id", 
						label: "Ubah",
						formatter:'<a href="<?php echo base_url();?>index.php/admin/content_modify/{value}"><img src="<?php echo IMAGES_DIR;?>/edit.ico"/ class="crud-btn"></a>&nbsp;&nbsp;&nbsp;&nbsp;',
						allowHTML: true
					},
					{
						key:"id",
						label:"Hapus",
						formatter:'<a href="<?php echo base_url();?>index.php/admin/del_post/{value}" onclick="return prompt_delete_item();" ><img src="<?php echo IMAGES_DIR;?>/delete.ico"/ class="crud-btn"></a>',
						allowHTML: true
					}
				],
				data: data_user,
				caption: "",
				rowsPerPage: 10
			});
			table.render("#list");
		});
	}
	
</script>