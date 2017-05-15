$(document).ready(function(){
            var next = 1;
            $(".add-more").click(function(e){
                e.preventDefault();
                var addto = "#b1";
                next = next + 1;
                var newIn = '<div class="input-group" style="margin-top: 1vh; margin-bottom: 5px" id ="field' + next + '" name ="field' + next + '"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span> <input type="text" name="mem' + next + '" class="form-control"  placeholder="Name of Member"/> ' +
                    '<span class="input-group-btn"><button id="remove' + (next) + '" class="btn btn-danger remove-me" >-</button></div></span> </div>';
                var newInput = $(newIn);
                $(addto).before(newInput);
                $("#field" + next).attr('data-source',$(addto).attr('data-source'));
                $("#count").val(next);

                $('.remove-me').click(function(e){
                    e.preventDefault();
                    var fieldNum = this.id.charAt(this.id.length-1);
                    var fieldID = "#field" + fieldNum;
//                    $(this).remove();
                    $(fieldID).remove();
//                    next--;
                });
            });
});