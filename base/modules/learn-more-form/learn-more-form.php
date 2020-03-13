<?php if (!empty($anchor_link)) : the_module('section-anchor', array('anchor_link' => $anchor_link)); endif; ?>
<section class="learn-more-form">
    <div class="container">
        <div class="learn-more-form__wrapper section-gutter">
            <div class="grid">
                <div class="grid__item learn-more-form__inner gravity-form gravity-form--learn-more">
                    <?php if(function_exists('gravity_form') && $use_gravity_form && !empty($form_id) ) : ?>
                        <?php gravity_form( $form_id, true, false, false, null, true, 0, true); ?>
                    <?php else: ?>
                        <script type="text/javascript">
                            function formElementSerializers() { function input(element) { switch (element.type.toLowerCase()) { case 'checkbox': case 'radio': return inputSelector(element); default: return valueSelector(element); } };
                                function inputSelector(element) { return element.checked ? element.value : null; };
                                function valueSelector(element) { return element.value; };
                                function select(element) { return (element.type === 'select-one' ? selectOne : selectMany)(element); };
                                function selectOne(element) { var index = element.selectedIndex; return index < 0 ? null : optionValue(element.options[index]); };
                                function selectMany(element) { var length = element.length; if (!length) return null; var values = []; for (var i = 0; i < length; i++) { var opt = element.options[i]; if (opt.selected) values.push(optionValue(opt)); } return values; };
                                function optionValue(opt) { if (document.documentElement.hasAttribute) return opt.hasAttribute('value') ? opt.value : opt.text; var element = document.getElementById(opt); if (element && element.getAttributeNode('value')) return opt.value; else return opt.text; };
                                return { input: input, inputSelector: inputSelector, textarea: valueSelector, select: select, selectOne: selectOne, selectMany: selectMany, optionValue: optionValue, button: valueSelector };
                            };
                            var requiredFields = new Array(); var requiredFieldGroups = new Array(); addRequiredField = function (id) { requiredFields.push (id); };
                            addRequiredFieldGroup = function (id, count) { requiredFieldGroups.push ([id, count]); };
                            missing = function (fieldName) { var f = document.getElementById(fieldName); var v = formElementSerializers()[f.tagName.toLowerCase()](f); if (v) { v = v.replace (/^\s*(.*)/, "$1"); v = v.replace (/(.*?)\s*$/, "$1"); } if (!v) { f.style.backgroundColor = '#FFFFCC'; return 1; } else { f.style.backgroundColor = ''; return 0; } };
                            missingGroup = function (fieldName, count) { var result = 1; var color = '#FFFFCC'; for (var i = 0; i < count; i++) { if (document.getElementById(fieldName+'-'+i).checked) { color = ''; result = 0; break; } } for (var i = 0; i < count; i++) document.getElementById(fieldName+'-'+i).parentNode.style.backgroundColor = color; return result; };
                            var validatedFields = new Array(); addFieldToValidate = function (id, validationType, arg1, arg2) { validatedFields.push ([ id, validationType, arg1, arg2 ]); };
                            validateField = function (id, fieldValidationValue, arg1, arg2) { var field = document.getElementById(id); var name = field.name; var value = formElementSerializers()[field.tagName.toLowerCase()](field); for (var i = 0; i < validators.length; i++) { var validationDisplay = validators[i][3]; var validationValue = validators[i][1]; var validationFunction = validators[i][2]; if (validationValue === fieldValidationValue) { if (!validationFunction (value,arg1,arg2,id)) { field.style.backgroundColor = '#FFFFCC'; alert (validationDisplay); return false; } else { field.style.backgroundColor = ''; } break; } } for (var i = 0; i < implicitValidators.length; i++) { var validationDisplay = implicitValidators[i][0]; var validationValue = implicitValidators[i][1]; var validationFunction = implicitValidators[i][2]; if (validationValue === fieldValidationValue) { if (!validationFunction (value,arg1,arg2,id)) { field.style.backgroundColor = '#FFFFCC'; alert (validationDisplay); return false; } else { field.style.backgroundColor = ''; } break; } } return true; };
                            var r = ''; formElementById = function(form, id) { for (var i = 0; i < form.length; ++i) if (form[i].id === id) return form[i]; return null; };
                            doSubmit = function(form) { try { if (typeof(customSubmitProcessing) === "function") customSubmitProcessing(); } catch (err) { } var ao_jstzo = formElementById(form, "ao_jstzo"); if (ao_jstzo) ao_jstzo.value = new Date().getTimezoneOffset(); var submitButton = document.getElementById(form.id+'_ao_submit_button'); submitButton.style.visibility = 'hidden'; var missingCount = 0; for (var i = 0; i < requiredFields.length; i++) if (requiredFields[i].indexOf(form.id+'_') === 0) missingCount += missing (requiredFields[i]); for (var i = 0; i < requiredFieldGroups.length; i++) if (requiredFieldGroups[i][0].indexOf(form.id+'_') === 0) missingCount += missingGroup (requiredFieldGroups[i][0], requiredFieldGroups[i][1]); if (missingCount >
                                0) { alert ('Please fill all required fields. '); submitButton.style.visibility = 'visible'; return; } for (var i = 0; i < validatedFields.length; i++) { var ff = validatedFields[i]; if (ff[0].indexOf(form.id+'_') === 0 && !validateField (ff[0], ff[1], ff[2], ff[3])) { document.getElementById(ff[0]).focus(); submitButton.style.visibility = 'visible'; return; } } if (formElementById(form, 'ao_p').value === '1') { submitButton.style.visibility = 'visible'; return; } formElementById(form, 'ao_bot').value = 'nope'; form.submit(); };
                        </script>

                        <form id="form_0001" method="post" enctype="multipart/form-data" action="//acton.tech.cornell.edu/acton/forms/userSubmit.jsp" accept-charset="UTF-8" target="_self">
                            <div class="gform_heading">
                                <h3 class="gform_title">Want to learn more?</h3>
                            </div>
                            <input type="hidden" name="ao_a" value="17955">
                            <input type="hidden" name="ao_f" value="0001">
                            <input type="hidden" name="ao_d" value="0001:d-0002">
                            <input type="hidden" name="ao_p" id="ao_p" value="0">
                            <input type="hidden" name="ao_jstzo" id="ao_jstzo" value="">
                            <input type="hidden" name="ao_cuid" value="">
                            <input type="hidden" name="ao_srcid" value="">
                            <input type="hidden" name="ao_bot" id="ao_bot" value="yes">
                            <input type="hidden" name="ao_camp" value="">
                            <div class="gform_body">
                                <ul class="gform_fields top_label form_sublabel_below description_below">
                                    <li class="gfield field_sublabel_below field_description_below gfield_visibility_visible">
                                        <label class="gfield_label" for="form_0001_fld_0">Name</label>
                                        <div class="ginput_container ginput_container_text">
                                            <input name="First Name" id="form_0001_fld_0" type="text" value="" class="medium" placeholder="Full Name" aria-invalid="false">
                                        </div>
                                        <script type="text/javascript">if (typeof(addRequiredField) != 'undefined') { addRequiredField ('form_0001_fld_0'); }</script>
                                    </li>

                                    <li class="gfield field_sublabel_below field_description_below gfield_visibility_visible">
                                        <label class="gfield_label" for="form_0001_fld_2">Email</label>
                                        <div class="ginput_container ginput_container_text">
                                            <input name="E-mail Address" id="form_0001_fld_2" type="text" value="" class="medium" placeholder="Email Address" aria-invalid="false">
                                        </div>
                                        <script type="text/javascript">if (typeof(addRequiredField) != 'undefined') { addRequiredField ('form_0001_fld_2'); }</script>
                                    </li>

                                    <li id="field_2_5" class="gfield field_sublabel_below field_description_below gfield_visibility_visible">
                                        <label class="gfield_label" for="form_0001_fld_3">I am interested in...</label>
                                        <div class="ginput_container ginput_container_select">
                                            <select name="I am interested in" id="form_0001_fld_3" class="medium gfield_select" aria-invalid="false">
                                                <option value="" selected="selected">Select Option</option>
                                                <option value="Master in Computer Science">
                                                    Master in Computer Science
                                                </option>
                                                <option value="Master in Operations Research and Information Engineering">
                                                    Master in Operations Research and Information Engineering
                                                </option>
                                                <option value="Master in Electrical and Computer Engineering">
                                                    Master in Electrical and Computer Engineering
                                                </option>
                                                <option value="Technion-Cornell Dual Master's Degrees in Connective Media">
                                                    Technion-Cornell Dual Master's Degrees in Connective Media
                                                </option>
                                                <option value="Technion-Cornell Dual Master's Degrees in Health Tech">
                                                    Technion-Cornell Dual Master's Degrees in Health Tech
                                                </option>
                                                <option value="Johnson Cornell Tech MBA">
                                                    Johnson Cornell Tech MBA
                                                </option>
                                                <option value="Master of Laws in Law, Technology and Entrepreneurship">
                                                    Master of Laws in Law, Technology and Entrepreneurship
                                                </option>
                                            </select>
                                        </div>
                                    </li>

                                    <li id="field_2_5" class="gfield field_sublabel_below field_description_below gfield_visibility_visible">
                                        <label class="gfield_label" for="form_0001_fld_4">I am interested in...</label>
                                        <div class="ginput_container ginput_container_select">
                                            <select name="I want to start in" id="form_0001_fld_4" class="medium gfield_select" aria-invalid="false">
                                                <option value="" selected="selected">Select Option</option>
                                                <option value="Undecided">Undecided</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                            </select>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="gform_footer top_label">
                                <button type="button" name="Submit" value="Submit" onClick="doSubmit(document.getElementById('form_0001'))" class="gform_button button p gravity-form__button" id="form_0001_ao_submit_button">Submit</button>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
