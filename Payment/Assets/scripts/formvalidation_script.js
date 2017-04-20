$(document).ready(function() {
	

	function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }

    function generateCaptcha() {
        $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));
    }

    generateCaptcha();
	
	
	
	$('#datePicker')
		.datepicker({
			format: 'yyyy-mm-dd',
			startDate: '1900-01-01',
			endDate: '2003-01-31'
		})
		.on('changeDate', function(e) {
			// Revalidate the date field
			$('#form1').formValidation('revalidateField', 'dob');
		});

	$('#form1').formValidation({
		framework: 'bootstrap',
			
		fields: {
			applicant_name: {
				trigger: 'blur',
				validators: {
					regexp: {
						regexp: /^[a-zA-Z\s.\s]+$/i,
						message: 'The full name can consist of alphabetical characters and spaces only'
					},
					stringLength: {
                        max: 40,
                        message: 'The Maximum characters are met'
                    }
				}
			},
			dob: {
				validators: {
					trigger: 'blur',
					notEmpty: {
						message: 'Date is required'
					},
					date: {
						format: 'YYYY-MM-DD',
						message: 'The date is not a valid'
					}
				}
			},
			
			altermobno: {
                    validators: {
						trigger: 'blur',
                        phone: {
                            country: 'IN',
                            message: 'The value is not valid %s phone number'
                        },
						stringLength: {
                        max: 16,
                        message: 'The Mobile number must be less than 16 characters'
                    }
                    }
                },
				mobno: {
                    validators: {
						trigger: 'blur',
                        phone: {
                            country: 'IN',
                            message: 'The value is not valid %s phone number'
                        },
						stringLength: {
                        max: 16,
                        message: 'The Mobile number must be less than 16 characters'
                    }
                    }
                },
			conformmobno: {
				trigger: 'blur',
				validators: {
					identical: {
                    field: 'mobno',
                    message: 'The Mobile number and confirm mobile number are not the same'
                }
				}
			},
			disablity: {
                    validators: {
                        notEmpty: {
                            message: 'Disablity status required'
                        }
                    }
              },
             disablity_reason: {
                    validators: {
                        callback: {
                            message: 'Please specific the reason',
                            callback: function(value, validator, $field) {
                                var disablity = $('#form1').find('[name="disablity"]:checked').val();
                                return (disablity !== 'Y') ? true : (value !== '');
                            }
                        }
                    }
                },
			isscst:
			{
			validators: {
				notEmpty: {
						message: 'SC/ST Status required'
					}
			}
			},
			scstfile: {
            validators: {
                file: {
                    extension: 'jpeg,jpg,pdf',
                    type: 'image/jpeg,image/jpeg,application/pdf',
					maxSize: 153600,   // 150 * 1024
                    message: 'Please choose maximum 150KB Size, Only PDF or JPG/JPEG files allowed.'
                },
          
				callback: {
                            message: 'SC/ST File required',
                            callback: function(value, validator, $field) {
                                var isscst22 = $('#form1').find('[name="isscst"]:checked').val();
							
                                return (isscst22 !== 'Y') ? true : (value !== '');
                            }
                        }
			}
				
        },
			role_college_name:
			{
				validators: {
					regexp: {
						regexp: /[a-zA-Z]+$/i,
						message: 'The College name can consist of alphabetical characters and spaces only'
					},
					stringLength: {
                        max: 40,
                        message: 'The Maximum numbers of characters met'
                    },
					callback: {
                            message: 'College name required',
                            callback: function(value, validator, $field) {
                                var roleforcollegename = $('#form1').find('[name="role"]:checked').val();
							
                                return (roleforcollegename !== 'Student') ? true : (value !== '');
                            }
                        }
				}
			},
			faculty_organization:
			{
				validators: {
					regexp: {
						regexp: /[a-zA-Z]+$/i,
						message: 'The College name can consist of alphabetical characters and spaces only'
					},
					stringLength: {
                        max: 40,
                        message: 'The Maximum numbers of characters met'
                    },
					callback: {
                            message: 'College name required',
                            callback: function(value, validator, $field) {
                                var roleforcollegename = $('#form1').find('[name="role"]:checked').val();
							
                                return (roleforcollegename !== 'Faculty') ? true : (value !== '');
                            }
                        }
				}
			},
			other_role:
			{
				validators: {
					regexp: {
						regexp: /[a-zA-Z]+$/i,
						message: 'It can consist of alphabetical characters and spaces only'
					},
					stringLength: {
                        max: 30,
                        message: 'The Maximum numbers of characters met'
                    },
					callback: {
                            message: 'Other role required',
                            callback: function(value, validator, $field) {
                                var roleforcollegename = $('#form1').find('[name="role"]:checked').val();
							
                                return (roleforcollegename !== 'Others') ? true : (value !== '');
                            }
                        }
				}
			},
			role_organization:
			{
				validators: {
					regexp: {
						regexp: /[a-zA-Z]+$/i,
						message: 'It can consist of alphabetical characters and spaces only'
					},
					stringLength: {
                        max: 40,
                        message: 'The Maximum numbers of characters met'
                    },
					callback: {
                            message: 'Organization name required',
                            callback: function(value, validator, $field) {
                                var roleforcollegename = $('#form1').find('[name="role"]:checked').val();
							
                                return (roleforcollegename !== 'Others') ? true : (value !== '');
                            }
                        }
				}
			},
			role:
			{
				validators: {
					notEmpty: {
						message: 'Role is required'
					}
				}
			},
			role_state:
			{
				validators: {
				notEmpty: {
						message: 'State is required'
					}
				}
			},
			role_city:
			{
				validators: {
				notEmpty: {
						message: 'City is required'
					}
				}
			},
			certificate_addr1:
			{
				validators: {
				
					regexp: {
						regexp: /^[a-zA-Z0-9\s,\s-\s]+$/i,
						message: 'It can consist of alphanumerical characters and spaces only'
					},
					stringLength: {
                        max: 50,
                        message: 'The Maximum numbers of characters met'
                    }
				}
			},
			certificate_addr2:
			{
				validators: {
					notEmpty: {
						message: 'Address line 2 is required'
					},
					regexp: {
						regexp: /^[a-zA-Z0-9\s,\s-\s]+$/i,
						message: 'It can consist of alphanumerical characters and spaces only'
					},
					stringLength: {
                        max: 30,
                        message: 'The Maximum numbers of characters met'
                    }
				}
			},
			certificate_addr3:
			{
				validators: {
					regexp: {
						regexp: /^[a-zA-Z0-9\s,\s-\s]+$/i,
						message: 'It can consist of alphanumerical characters and spaces only'
					},
					stringLength: {
                        max: 20,
                        message: 'The Maximum numbers of characters met'
                    }
				}
			},
			certificate_pincode:
			{
				validators: {
				notEmpty: {
						message: 'Pincode is required'
					},
					regexp: {
						regexp: /^[0-9]+$/i,
						message: 'It can consist of Numerical characters only'
					},
					stringLength: {
                        max: 6,
						min:6,
                        message: 'Pincode must be 6 characters'
                    }
				}
			},
			certificate_state:
			{
				validators: {
				notEmpty: {
						message: 'Certificate State is required'
					}
				}
			},
			certificate_city:
			{
				validators: {
				notEmpty: {
						message: 'Certificate City is required'
					}
				}
			},
			examdate1:
			{
			validators:
			{
				different:
				{
					field: 'examdate2',
                    message: 'The exam date1 and exam date2 are not the same'
				}
			}
			},
             examdate2: {
                    validators: {
						callback: {
                            message: 'Please specific the exam date',
                            callback: function(value, validator, $field) {
                                var checkfor2exam = $('#form1').find('[name="checkfor2exam"]:checked').val();
								var examdt1  = validator.getFieldElements('examdate1').val();
                                return (checkfor2exam !== 'Y') ? null : (value !== '' && value !== examdt1);
                            }
                    }
				}
			 },
			subject1:
			{
				validators:
				{
					different:
				{
					field: 'subject2',
                    message: 'please select different coursename'
				}
				}
				
			},
			subject2: {
                    validators: {
						callback: {
                            message: 'Please specific the exam name',
                            callback: function(value, validator, $field) {
                                var checkfor2exam = $('#form1').find('[name="checkfor2exam"]:checked').val();
								var subject1  = validator.getFieldElements('subject1').val();
                                return (checkfor2exam !== 'Y') ? null : (value !== '' && value !== subject1);
                            }
                    }
				}
			 },
			state2: {
                    validators: {
						callback: {
                            message: 'Please specific the exam state',
                            callback: function(value, validator, $field) {
                                var checkfor2exam = $('#form1').find('[name="checkfor2exam"]:checked').val();
								$('#form1').formValidation('revalidateField', 'city2');
                                return (checkfor2exam !== 'Y') ? null : (value !== '');
                            }
                    }
				}
			 },
			second_state2: {
                    validators: {
						callback: {
                            message: 'Please specific the exam state',
                            callback: function(value, validator, $field) {
                                var checkfor2exam = $('#form1').find('[name="checkfor2exam"]:checked').val();
								$('#form1').formValidation('revalidateField', 'second_city2');
                                return (checkfor2exam !== 'Y') ? null : (value !== '');
                            }
                    }
				}
			 },
			city2: {
                    validators: {
						callback: {
                            message: 'Please specific the exam city',
                            callback: function(value, validator, $field) {
                                var checkfor2exam = $('#form1').find('[name="checkfor2exam"]:checked').val();
								var options  = validator.getFieldElements('city2').val();
								var seconcity2  = validator.getFieldElements('second_city2').val();
                         
                                return (checkfor2exam !== 'Y') ? null : (options !== '' && options.length !== 1 && seconcity2 != options);
                            }
                    }
				}
			 },
			second_city2: {
                    validators: {
						callback: {
                            message: 'Please specific the exam city',
                            callback: function(value, validator, $field) {
                                var checkfor2exam = $('#form1').find('[name="checkfor2exam"]:checked').val();
								var options  = validator.getFieldElements('second_city2').val();
								var city2  = validator.getFieldElements('city2').val();
                         
                                return (checkfor2exam !== 'Y') ? null : (options !== '' && options.length !== 1 && city2 != options);
                            }
                    }
				}
			 },
			know_abt_course_others:{
				validators: {
						callback: {
							
							message: 'Please fill the other textbox,Characters must be greater than 4 and less than 30',
                            callback: function(value, validator, $field) {
                               var options  = validator.getFieldElements('know_abt_course').val();
								var len = value.length;
								return (options !== 'Others') ? null : ((value !== '')&&(len <= 30)&&(len >= 4));
						}
			}
				}
			},
			photo:
			{
				validators:
				{
					notEmpty: {
						message: 'please upload the photo'
					},
					  file: {
                    extension: 'jpg',
                    type: 'image/jpeg',
					maxSize: 81920,
				    minSize: 15360,// 2048 * 1024
                    message: 'jpg format only allowed. file maximum size 80kb and minimum size 15kb'
                }
				}
			},
			signature:
			{
				validators:
				{
					notEmpty: {
						message: 'Signature is required'
					},
					  file: {
                    extension: 'jpg',
                    type: 'image/jpeg',
					maxSize: 81920,
				    minSize: 15360,// 2048 * 1024
                    message: 'jpg format only allowed. file maximum size 80kb and minimum size 15kb'
                }
				}
			},
			agree: {
                validators: {
                    notEmpty: {
                        message: 'You must agree with the terms and conditions'
                    }
                }
            },
			captcha: {
                    validators: {
                        callback: {
                            message: 'Wrong answer',
                            callback: function (value, validator, $field) {
                                // Determine the numbers which are generated in captchaOperation
                                var items = $('#captchaOperation').html().split(' '),
                                    sum   = parseInt(items[0]) + parseInt(items[2]);
                                return value == sum;
                            }
                        }
                    }
                },
			emailid:
			{
				validators: {
					
					emailAddress: {
                        message: 'The value is not a valid email address'
                    }
				}
			},
			confirm_emailid:
			{
				validators: {
					
					identical: {
                    field: 'emailid',
                    message: 'The EmailId and Confirm EmailId should be the same as each other'
                }
                    }
				},
			role_otherscity:
			{
				validators: {
				
					callback: {
											
							message: 'Please fill the city name',
                            callback: function(value, validator, $field) {
                               var options  = validator.getFieldElements('role_city').val();
										var len = value.length;
								return (options !== 'Others') ? null : ((value !== '')&&(len <= 30)&&(len >= 4));
						}
			}
					
				}
			},
			certificate_othercityname:
			{
				validators: {
				
					callback: {
											
							message: 'Please fill the city name',
                            callback: function(value, validator, $field) {
                               var options  = validator.getFieldElements('certificate_city').val();
										var len = value.length;
								return (options !== 'Others') ? null : ((value !== '')&&(len <= 30)&&(len >= 4));
						}
			}
					
				}
			},
			city1:
			{
				validators:
				{
					different:
					{
						field:'second_city1',
						message:'select different city name'
						
					}
				}
			},
			second_city1:
			{
				validators:
				{
					different:
					{
						field:'city1',
						message:'select different city name'
						
					}
				}
			}
	
			
			
			
			
			
		}
		
	})
	
	.on('change', '[name="certificate_city"]', function(e) {
            $('#form1').formValidation('revalidateField', 'certificate_othercityname');
        })
	.on('change', '[name="role_city"]', function(e) {
            $('#form1').formValidation('revalidateField', 'role_otherscity');
        })	
	.on('change', '[name="disablity"]', function(e) {
            $('#form1').formValidation('revalidateField', 'disablity_reason');
        })
			
        .on('success.field.fv', function(e, data) {
            if (data.field === 'disablity_reason') {
                var disablity1 = $('#form1').find('[name="disablity"]:checked').val();
                // User choose given channel
                if (disablity1 !== 'Y') {
                    // Remove the success class from the container
                    data.element.closest('.form-group').removeClass('has-success');

                    // Hide the tick icon
                    data.element.data('fv.icon').hide();
                }
            }
        })
	.on('change', '[name="isscst"]', function(e) {
            $('#form1').formValidation('revalidateField', 'scstfile');
        })
        .on('success.field.fv', function(e, data) {
            if (data.field === 'scstfile') {
                var scst = $('#form1').find('[name="isscst"]:checked').val();
                // User choose given channel
                if (scst !== 'Y') {
                    // Remove the success class from the container
                    data.element.closest('.form-group').removeClass('has-success');

                    // Hide the tick icon
                    data.element.data('fv.icon').hide();
                }
            }
        })
	.on('change', '[name="role"]', function(e) {
		var role_status = $('#form1').find('[name="role"]:checked').val();
	
			 $('#form1').formValidation('revalidateField', 'faculty_organization');
			$('#form1').formValidation('revalidateField', 'role_college_name');
            $('#form1').formValidation('revalidateField', 'other_role');
            $('#form1').formValidation('revalidateField', 'role_organization');
		
		
        })
        .on('success.field.fv', function(e, data) {
            if (data.field === 'name_college') {
                var role = $('#form1').find('[name="role"]:checked').val();
                // User choose given channel
              if ((role !== 'Student')||(role !== 'Faculty')||(role !== 'Others')) {
                    // Remove the success class from the container
                    data.element.closest('.form-group').removeClass('has-success');

                    // Hide the tick icon
                    data.element.data('fv.icon').hide();
			  }
				
            }
        })
	.on('change', '[name="role_state"]', function(e) {
            $('#form1').formValidation('revalidateField', 'role_city');
		if(role_state === '')
		{
			return;
		}
        })
.on('change', '[name="certificate_state"]', function(e) {
            $('#form1').formValidation('revalidateField', 'certificate_city');
		if(certificate_state === '')
		{
			return;
		}
        })
	.on('change', '[name="checkfor2exam"]', function(e) {
           $('#form1').formValidation('revalidateField', 'examdate2');
           $('#form1').formValidation('revalidateField', 'subject2');
           $('#form1').formValidation('revalidateField', 'state2');
           $('#form1').formValidation('revalidateField', 'second_state2');
           $('#form1').formValidation('revalidateField', 'city2');
			$('#form1').formValidation('revalidateField', 'second_city2');
		
            //$('#form1').formValidation('revalidateField', 'checkfor2exam');
            
            
        })
		.on('change', '[name="know_abt_course"]', function(e) {
            $('#form1').formValidation('revalidateField', 'know_abt_course_others');
        })
	.on('err.form.fv', function(e) {
            generateCaptcha();
        });
	


	
	});