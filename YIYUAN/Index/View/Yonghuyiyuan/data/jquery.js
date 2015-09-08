/*
    表单控件
*/

/***************************
  Labels
***************************/
var jqTransformGetLabel = function(objfield) {
    var selfForm = $(objfield.get(0).form);
    var oLabel = objfield.next();
    if (!oLabel.is('label')) {
        oLabel = objfield.prev();
        if (oLabel.is('label')) {
            var inputname = objfield.attr('id');
            if (inputname) {
                oLabel = selfForm.find('label[for="' + inputname + '"]');
            }
        }
    }
    if (oLabel.is('label')) {
        return oLabel.css('cursor', 'pointer');
    }
    return false;
};

/* Hide all open selects */
var jqTransformHideSelect = function(oTarget) {
    var ulVisible = $('.selectWrapper ul:visible');
    ulVisible.each(function() {
        var oSelect = $(this).parents(".selectWrapper:first").find("select").get(0);
        //do not hide if click on the label object associated to the select
        if (!(oTarget && oSelect.oLabel && oSelect.oLabel.get(0) == oTarget.get(0))) {
            $(this).hide();
        }
    });
};
/* Check for an external click */
var jqTransformCheckExternalClick = function(event) {
    if ($(event.target).parents('.selectWrapper').length === 0) {
        jqTransformHideSelect($(event.target));
    }
};

/* Apply document listener */
var jqTransformAddDocumentListener = function() {
    $(document).mousedown(jqTransformCheckExternalClick);
};

/***************************
      Check Boxes 
     ***************************/
$.fn.jqTransCheckBox = function() {
    return this.each(function() {
        if ($(this).hasClass('jqTransformHidden')) {
            return;
        }

        var $input = $(this);
        var inputSelf = this;

        //set the click on the label
        var oLabel = jqTransformGetLabel($input);
        oLabel && oLabel.click(function(ev) {
            aLink.trigger('click');
            ev.stopPropagation();
        });

        var aLink = $('<a href="javascript:void(0);" class="checkbox"></a>');
        //wrap and add the link
        $input.addClass('jqTransformHidden').wrap('<span class="checkboxWrapper"></span>').parent().prepend(aLink);
        //on change, change the class of the link
        $input.change(function(ev) {
            this.checked && aLink.addClass('checkboxChecked') || aLink.removeClass('checkboxChecked');
            ev.stopPropagation(); 
            return true;
        });
        // Click Handler, trigger the click and change event on the input
        aLink.click(function(ev) {
            //do nothing if the original input is disabled
            if ($input.attr('disabled')) {
                return false;
            }
            //trigger the envents on the input object
            $input.trigger('click').trigger("change");
            ev.stopPropagation();
            return false;
        });

        // set the default state
        this.checked && aLink.addClass('checkboxChecked');
    });
};
/***************************
  Radio Buttons 
 ***************************/
$.fn.jqTransRadio = function() {
    return this.each(function() {
        if ($(this).hasClass('jqTransformHidden')) {
            return;
        }

        var $input = $(this);
        var inputSelf = this;

        oLabel = jqTransformGetLabel($input);
        oLabel && oLabel.click(function() {
            aLink.trigger('click');
        });

        var aLink = $('<a href="javascript:void(0);" class="radio" rel="' + this.name + '"></a>');
        $input.addClass('jqTransformHidden').wrap('<span class="radioWrapper"></span>').parent().prepend(aLink);

        $input.change(function() {
            inputSelf.checked && aLink.addClass('radioChecked') || aLink.removeClass('radioChecked');
            return true;
        });
        // Click Handler
        aLink.click(function() {
            if ($input.attr('disabled')) {
                return false;
            }
            $input.trigger('click').trigger('change');

            // uncheck all others of same name input radio elements
            $('input[name="' + $input.attr('name') + '"]', inputSelf.form).not($input).each(function() {
                $(this).attr('type') == 'radio' && $(this).trigger('change');
            });

            return false;
        });
        // set the default state
        inputSelf.checked && aLink.addClass('radioChecked');
    });
};

/***************************
  Select 
 ***************************/
$.fn.jqTransSelect = function() {
    var nlen = $(this).length;
    return this.each(function(index) {
        var $select = $(this);
        var hasClass = false;
        // if($select.hasClass('jqTransformHidden')) {return;}
        // if($select.attr('multiple')) {return;}

        var oLabel = jqTransformGetLabel($select);
        var $wrapper;
        /* First thing we do is Wrap it */
        if (!$select.hasClass('jqTransformHidden')) {
            hasClass = true;
            $wrapper = $select
                .addClass('jqTransformHidden')
                .wrap('<div class="selectWrapper"></div>')
                .parent()
                .css({
                    zIndex: nlen - index
                });

            /* Now add the html for the select */
            $wrapper.prepend('<div><span></span><a href="javascript:;" class="jqTransformSelectOpen"></a></div><ul style="overflow-y:auto;"></ul>');
        } else {
            $wrapper = $select.parent('.selectWrapper');
        }


        var $ul = $('ul', $wrapper).css('width', $select.width()).hide().empty();

        /* Now we add the options */
        $('option', this).each(function(i) {
            var oLi = $('<li><a href="javascript:void(0);" index="' + i + '">' + $(this).html() + '</a></li>');
            $ul.append(oLi);
        });

        /* Add click handler to the a */
        $ul.find('a').click(function() {
            $('a.selected', $wrapper).removeClass('selected');
            $(this).addClass('selected');
            /* Fire the onchange event */
            if ($select[0].selectedIndex != $(this).attr('index') ) {//&& $select[0].onchange
                $select[0].selectedIndex = $(this).attr('index');
                //$select[0].onchange();    
                $select.trigger('change');           
            }
            $select[0].selectedIndex = $(this).attr('index');
            $('span:eq(0)', $wrapper).html($(this).html());
            $ul.hide();
            return false;
        });
        /* Set the default */
        $('a:eq(' + this.selectedIndex + ')', $ul).click();
        $('span:first', $wrapper).unbind('click').click(function() {
            $("a.jqTransformSelectOpen", $wrapper).trigger('click');
        });
        oLabel && oLabel.unbind('click').click(function() {
            $("a.jqTransformSelectOpen", $wrapper).trigger('click');
        });
        this.oLabel = oLabel;

        /* Apply the click handler to the Open */
        var oLinkOpen;

        oLinkOpen = $('a.jqTransformSelectOpen', $wrapper).unbind('click')
            .click(function(event) {
                //Check if box is already open to still allow toggle, but close all other selects
                if ($ul.css('display') == 'none') {
                    jqTransformHideSelect();
                }
                if ($select.attr('disabled')) {
                    return false;
                }

                $ul.slideToggle('fast', function() {
                    var offSet = ($('a.selected', $ul).offset().top - $ul.offset().top);
                    $ul.animate({
                        scrollTop: offSet
                    });
                });
                return false;
            });

        // Set the new width
        var iSelectWidth = $select.outerWidth();
        var oSpan = $('span:first', $wrapper);
        var newWidth = (iSelectWidth > oSpan.innerWidth()) ? iSelectWidth + oLinkOpen.outerWidth() : iSelectWidth + oLinkOpen.outerWidth(); //计算DIV的宽
        $wrapper.css('width', newWidth);
        $ul.css('width', newWidth); // 计算UL的宽
        oSpan.css({
            width: iSelectWidth
        });

        // Calculate the height if necessary, less elements that the default height
        //show the ul to calculate the block, if ul is not displayed li height value is 0
        $ul.css({
            display: 'block',
            visibility: 'hidden'
        });
        var iSelectHeight = ($('li', $ul).length) * ($('li:first', $ul).height()); //+1 else bug ff
        (iSelectHeight < $ul.height()) && $ul.css({
            height: iSelectHeight,
            'overflow': 'hidden'
        }); //hidden else bug with ff
        $ul.css({
            display: 'none',
            visibility: 'visible'
        });

    });
};

$.fn.jsTransDate = function() {
    return function(ele) {
        $(ele).html('<select class="selDate" ></select><select class="selDate"></select><select class="selDate"></select>');
        $('select', ele).each(function(index, val) {
            var _html = "";
            if (index === 0) {
                var dYear = new Date().getFullYear();
                for (var i = dYear - 65; i <= dYear - 18; i++) {
                    _html += "<option value='" + i + "'>" + i + "</option>";
                }
            } else if (index === 1) {
                for (var i = 1; i < 13; i++) {
                    _html += "<option value='" + i + "'>" + i + "</option>";
                }

                $(this)[0].onchange = function(e) {
                    var _dHtml = "";
                    var dYear = new Date().getYear();
                    var _select = $('select option:selected', ele);
                    var _year = parseInt(_select[0].value);
                    var _month = parseInt(_select[1].value);
                    if (_month == 2) {
                        if (_year % 4 == 0 && _year % 100 != 0 || _year % 400 == 0) {
                            _dHtml = "";
                            for (var j = 1; j < 30; j++) {

                                _dHtml += "<option value='" + j + "'>" + j + "</option>";
                            }
                        } else {
                            _dHtml = "";
                            for (var j = 1; j < 29; j++) {
                                _dHtml += "<option value='" + j + "'>" + j + "</option>";
                            }
                        }

                    } else {
                        if (_month == 1 || _month == 3 || _month == 5 || _month == 7 || _month == 8 || _month == 10 || _month == 12) {
                            _dHtml = "";
                            for (var j = 1; j < 32; j++) {
                                _dHtml += "<option value='" + j + "'>" + j + "</option>";
                            }
                        } else {
                            _dHtml = "";
                            for (var j = 1; j < 31; j++) {
                                _dHtml += "<option value='" + j + "'>" + j + "</option>";
                            }
                        }
                    }

                    $(this).parent().next('.selectWrapper').find("select").html("").html(_dHtml).eq(0).jqTransSelect();                   
                }
            } else {
                for (var i = 1; i < 32; i++) {
                    _html += "<option value='" + i + "'>" + i + "</option>";
                }
            }
            $(this).html(_html);
        });

    }(this);
};