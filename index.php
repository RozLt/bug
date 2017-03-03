<?php foreach($queryRecords as $res) :?>
      <tr data-row-id="<?php echo $res['mem_id'];?>">
         <td class="editable-col" contenteditable="false" col-index='0' oldVal ="<?php echo $res['mem_id'];?>"><?php echo $res['mem_id'];?></td>
         
         <td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $res['name'];?>"><a class="edit"><?php echo $res['name'];?></a></td>
         <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $res['last'];?>"><?php echo $res['last'];?></td>
         <td class="editable-col" contenteditable="true" col-index='3' oldVal ="<?php echo $res['username'];?>"><?php echo $res['username'];?></td>
         <td class="editable-col" contenteditable="true" col-index='4' oldVal ="<?php echo $res['email'];?>"><?php echo $res['email'];?></td>


<script type="text/javascript">
$(document).ready(function(){
    $('td.editable-col').on('focusout', function() {
        data = {};
        data['val'] = $(this).text();
        data['mem_id'] = $(this).parent('tr').attr('data-row-id');
        data['index'] = $(this).attr('col-index');
        if($(this).attr('oldVal') === data['val'])
        return false;

        $.ajax({   
                  
                    type: "POST",  
                    url: "user/server.user.php",
                    cache:false,  
                    data: data,
                    dataType: "json",               
                    success: function(response)  
                    {   
                        //$("#loading").hide();
                        if(!response.error) {
                            showEditedNotification('top','right');
                            
                        } else {
                            
                            showErrorNotification('top','right');
                        }
                    }   
                });
    });
});

</script> 