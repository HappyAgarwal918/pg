(function ( $ ) {
    $.fn.multiStepForm = function(args) {
        if(args === null || typeof args !== 'object' || $.isArray(args))
          throw  " : Called with Invalid argument";
        var form = this;
        var tabs = form.find('.tab');
        var steps = form.find('.step');
        steps.each(function(i, e){
          $(e).on('click', function(ev){
          });
        });
        form.navigateTo = function (i) {/*index*/
          /*Mark the current section with the class 'current'*/
          tabs.removeClass('current').eq(i).addClass('current');
          // Show only the navigation buttons that make sense for the current section:
          form.find('.previous').toggle(i > 0);
          atTheEnd = i >= tabs.length - 1;
          form.find('.next').toggle(!atTheEnd);
          // console.log('atTheEnd='+atTheEnd);
          form.find('.submit').toggle(atTheEnd);
          fixStepIndicator(curIndex());
          return form;
        }
        function curIndex() {
          /*Return the current index by looking at which section has the class 'current'*/
          return tabs.index(tabs.filter('.current'));
        }
        function fixStepIndicator(n) {
          steps.each(function(i, e){
            i == n ? $(e).addClass('active') : $(e).removeClass('active');
          });
        }
        /* Previous button is easy, just go back */
        form.find('.previous').click(function() {
          form.navigateTo(curIndex() - 1);
        });

        /* Next button goes forward iff current block validates */
        form.find('.next').click(function() {
          if('validations' in args && typeof args.validations === 'object' && !$.isArray(args.validations)){
            if(!('noValidate' in args) || (typeof args.noValidate === 'boolean' && !args.noValidate)){
              form.validate(args.validations);
              if(form.valid() == true){
                form.navigateTo(curIndex() + 1);
                return true;
              }
              return false;
            }
          }
          form.navigateTo(curIndex() + 1);
        });
        form.find('.submit').on('click', function(e){
          if(typeof args.beforeSubmit !== 'undefined' && typeof args.beforeSubmit !== 'function')
            args.beforeSubmit(form, this);
          /*check if args.submit is set false if not then form.submit is not gonna run, if not set then will run by default*/        
          if(typeof args.submit === 'undefined' || (typeof args.submit === 'boolean' && args.submit)){
            form.submit();
          }
          return form;
        });
        /*By default navigate to the tab 0, if it is being set using defaultStep property*/
        typeof args.defaultStep === 'number' ? form.navigateTo(args.defaultStep) : null;

        form.noValidate = function() {
          
        }
        return form;
    };
  }( jQuery ));


  $(document).ready(function(){
    var val = {
        // Specify validation rules
        rules: {
          name: "required",
          locality: "required",
          full_address: "required",
          room_type: "required",
          sb_room_count: "required",
          sb_bathroom_count: "required",
          sb_room_size: "required",
          sb_category: "required",
          sb_furnished_type: "required",
          sb_price: "required",
          db_room_count: "required",
          db_bathroom_count: "required",
          db_room_size: "required",
          db_category: "required",
          db_furnished_type: "required",
          db_price: "required",
          tb_room_count: "required",
          tb_bathroom_count: "required",
          tb_room_size: "required",
          tb_category: "required",
          tb_furnished_type: "required",
          tb_price: "required",
          fb_room_count: "required",
          fb_bathroom_count: "required",
          fb_room_size: "required",
          fb_category: "required",
          fb_furnished_type: "required",
          fb_price: "required",
          food: "required",
          meal_type: "required",
          tenant: "required",
          parking: "required",
          description: "required",
          "amenities[]": {
             required: true,
             minlength: 2
          },
          "room_type[]": { 
              required: true, 
              minlength: 1 
          } 
        },
        // Specify validation error messages
        messages: {
          name:    "Name is required",
          "room_type[]":    "Select atleast one",
          "amenities[]": "Select atleast two",
        }
    }
    $("#multistep_form").multiStepForm(
    {
      // defaultStep:0,
      beforeSubmit : function(form, submit){
        // console.log("called before submiting the form");
        // console.log(form);
        // console.log(submit);
      },
      validations:val,
    }
    ).navigateTo(0);
  });


$(function() {
  // page 1
    $("input[name='room_type[]']").click(function() {
      ($("#room_type1").is(":checked")) ? $(".room_type1-1").removeClass("hidden"): $(".room_type1-1").addClass("hidden");
      ($("#room_type2").is(":checked")) ? $(".room_type2-1").removeClass("hidden"): $(".room_type2-1").addClass("hidden");
      ($("#room_type3").is(":checked")) ? $(".room_type3-1").removeClass("hidden"): $(".room_type3-1").addClass("hidden");
      ($("#room_type4").is(":checked")) ? $(".room_type4-1").removeClass("hidden"): $(".room_type4-1").addClass("hidden");
    });
    $("input[name='food']").click(function() {
      ($("#food1").is(":checked")) ? $(".food1-1").removeClass("hidden"): $(".food1-1").addClass("hidden");
    });
    $("input[name='amenities[]']").click(function() {
      ($("#parking").is(":checked")) ? $(".parking-1").removeClass("hidden"): $(".parking-1").addClass("hidden");
    });
});