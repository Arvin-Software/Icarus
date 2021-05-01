$(document).ready(function(){
    var a = 1;
            // alert('hello');
            $.post("clerklybooksapi.php",
            {
                id: "p",
                name: "Donald Duck",
                city: "Duckburg"
            },
            function(data, status){
                // $('#contentx').html(data);
                // alert(a);
                myObj = JSON.parse(data);
                
                $('#here_table').append('<tr><td><select id="prod' + a +'" name="prod' + a + '" class="custom-select prodx" style="border: none;"></select></td><td><input class="form-control  rte " required="" style="border: none;" type="text" name="hsn' + a + '" id="hsn' + a + '"></td><td><input class="form-control  rte accx" style="border: none;" required="" type="text" name="dt' + a + '" id="dt' + a + '"></td><td><input class="form-control rte" style="border: none;" required="" type="text" name="rt' + a + '" id="rt' + a + '"></td><td><input class="form-control rte " style="border: none;" required="" type="text" name="cgstper' + a + '" id="cgstper' + a + '"></td><td><input class="form-control rte " style="border: none;" required="" type="text" name="sgstper' + a + '" id="sgstper' + a + '"></td><td><input class="form-control rte" required="" style="border: none;" type="text" name="amt' + a + '" id="amt' + a + '"></td><td><button type="button" id="deletebut" name="deletebut" class="btn btn-danger btndeleterowadded">X</button></td></tr>');
                for(i=1; i<=myObj[0]; i++){
                    $('#prod1').append('<option>' + myObj[i] + '</option>');
                }
                $('#here_table').append('');
                $('#num').val(a);
                a += 1;
            })
    // $('#here_table').append( '<tr><td><input type="text" class="w3-input w3-border" name="ct' + a + '" id="ct' + a + '" value=""></td><td><input class="w3-input w3-border" required="" type="text" name="dt' + a + '" id="dt' + a + '"></td><td><input class="w3-input w3-border" required="" type="text" name="rt' + a + '" id="rt' + a + '"></td><td><input class="w3-input w3-border" required="" type="text" name="cgstper' + a + '" id="cgstper' + a + '"></td><td><input class="w3-input w3-border" required="" type="text" name="cgst' + a + '" id="cgst' + a + '"></td><td><input class="w3-input w3-border" required="" type="text" name="sgstper' + a + '" id="sgstper' + a + '"></td><td><input class="w3-input w3-border" required="" type="text" name="sgst' + a + '" id="sgst' + a + '"></td><td><input class="w3-input w3-border" required="" type="text" name="amt' + a + '" id="amt' + a + '"></td></tr>' );
    
    $('#addbut').click(function(){
        $.post("clerklybooksapi.php",
            {
                id: "p",
                name: "Donald Duck",
                city: "Duckburg"
            },
            function(data, status){
                // $('#contentx').html(data);
                // alert(a);
                myObj = JSON.parse(data);
                // alert(myObj[0]);
                $('#here_table').append('<tr><td><select id="prod' + a +'" name="prod' + a + '" class="custom-select prodx" style="border: none;"></select></td><td><input class="form-control  rte" required="" style="border: none;" type="text" name="hsn' + a + '" id="hsn' + a + '"></td><td><input class="form-control  rte accx" style="border: none;" required="" type="text" name="dt' + a + '" id="dt' + a + '"></td><td><input class="form-control rte" style="border: none;" required="" type="text" name="rt' + a + '" id="rt' + a + '"></td><td><input class="form-control rte " style="border: none;" required="" type="text" name="cgstper' + a + '" id="cgstper' + a + '"></td><td><input class="form-control rte " style="border: none;" required="" type="text" name="sgstper' + a + '" id="sgstper' + a + '"></td><td><input class="form-control rte" required="" style="border: none;" type="text" name="amt' + a + '" id="amt' + a + '"></td><td><button type="button" id="deletebut" name="deletebut" class="btn btn-danger btndeleterowadded">X</button></td></tr>');
                for(i=1; i<=myObj[0]; i++){
                    $('#prod'+a).append('<option>' + myObj[i] + '</option>');
                }
                $('#here_table').append('');
                $('#num').val(a);
                a += 1;
            })
        // $('#here_table').append( '<tr><td><input type="text" class="w3-input w3-border rte" name="ct' + a + '" id="ct' + a + '" value=""></td><td><input class="w3-input w3-border" required="" type="text" name="dt' + a + '" id="dt' + a + '"></td><td><input class="w3-input w3-border" required="" type="text" name="rt' + a + '" id="rt' + a + '"></td><td><input class="w3-input w3-border" required="" type="text" name="cgstper' + a + '" id="cgstper' + a + '"></td><td><input class="w3-input w3-border" required="" type="text" name="cgst' + a + '" id="cgst' + a + '"></td><td><input class="w3-input w3-border" required="" type="text" name="sgstper' + a + '" id="sgstper' + a + '"></td><td><input class="w3-input w3-border" required="" type="text" name="sgst' + a + '" id="sgst' + a + '"></td><td><input class="w3-input w3-border" required="" type="text" name="amt' + a + '" id="amt' + a + '"></td></tr>' );
    })
    $(document).on('change','.prodx',function(){
        
            var element = $(this);
            
            var idx = element.attr('id');
            var num = idx[idx.length -1];
            // var del_id = $(idx + "option:selected").val();
            var del_id = $('#' + idx).find('option:selected').val();
            
            //alert(num);
            // var del_id = element.attr("option");
            // alert(num + " : " + del_id);
            $.post("clerklybooksapi.php",
            {
                id: "g",
                typ: 'inv',
                elem: del_id,
                name: "Donald Duck",
                city: "Duckburg"
            },
            function(data, status){
                // $('#contentx').html(data);
                // alert(a);
                myObj = JSON.parse(data);
                // alert(myObj[0]);
                $('#hsn'+num).val(myObj[0]);
                $('#rt' + num).val(myObj[1]);
                $('#cgstper' + num).val(myObj[2]);
                $('#sgstper' + num).val(myObj[3]);
            })
            
    })
    // $('.accx').change(function(){
    // 	alert('sex');
    // })
    $(document).on('keyup','.accx',function(){
        var element = $(this);
            
            var idx = element.attr('id');
            var num = idx[idx.length -1];
            // alert(idx + ' : ' + num);
            var base = $('#dt' + num).val();
    var rte = $('#rt' + num).val();
    var sgstper = $('#sgstper'+num).val();
    var cgstper = $('#cgstper'+num).val();
    var resc = parseFloat(Math.round((parseFloat(base) * parseFloat(rte)) * parseFloat(cgstper))/100).toFixed(2);
    
    var ress = parseFloat(Math.round((parseFloat(base) * parseFloat(rte)) * parseFloat(sgstper))/100).toFixed(2);
   
    var res = parseFloat(Math.round((parseFloat(base) * parseFloat(rte)) + parseFloat(resc) + parseFloat(ress))).toFixed(2);
    $('#amt'+num).val(res);
    // alert($('#totl').html());
    var resf = 0;
    for(i=1; i<=$('#num').val(); i++){
        resf = resf + parseFloat($('#amt'+i).val());
        
    }
    $('#totl').val(Math.round(resf).toFixed(2));
    })
    $(document).on('click', 'button.btndeleterowadded', function(){
        $(this).closest('tr').remove();
        return false;
    });
})