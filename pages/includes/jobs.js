


var jobs = [];

$(document).ready(function () {


	var user = $("#user").val();

	$.ajax({
		url: "php_queries/get_data_table.php",
		type: 'GET',
		data: { user: user },
		dataType: 'json',
		success: function (response) {
			header = ""
			header += "<tr>";
			header += "<th><input type='checkbox' id='selectAll' /></th>";
			header += "<th>Due</th>";
			header += "<th>Worksheet</th>";
			header += "<th>New</th>";
			header += "<th><i class='fa fa-fw fa-exclamation-circle' title='Important'></i></th>";
			header += "<th><i class='fa fa-fw fa-bell' title='Reminder'></i></th>";
			header += "<th><i class='fa fa-fw fa-folder' title='Requires Invoice'></i></th>";
			header += "<th>Job Ref</th>";
			header += "<th>Cust Ref</th>";
			header += "<th>Address 1</th>";
			header += "<th>Name</th>";
			header += "<th><i class='fa fa-fw fa-envelope'></i></th>";
			header += "<th>Schedule</th>";
			header += "<th>Price</th>";
			header += "<th>Balance</th>";
			header += "<th>Quote</th>";
			header += "<th>Round</th>";
			header += "<th>Order</th>";
			header += "<th>Status</th>";
			header += "</tr> ";
			content = "";
			if (response) {
				console.log('jobs', response);
				jobs = response;
				var len = response.length;
				for (var i = 0; i < len; i++) {
					var id = response[i]['id'];
					var jobs_sched_date = response[i]['jobs_sched_date'];
					var job_notes = response[i]['job_notes'];
					var job_ref = response[i]['job_ref'];
					var cust_ref = response[i]['cust_ref'];
					var cust_address1 = response[i]['cust_address1'];
					var one_off = response[i]['one_off'];
					var jobs_price1 = response[i]['jobs_price1'];
					var jobs_balance = response[i]['jobs_balance'];
					var my_round = response[i]['my_round'];
					var stats = response[i]['stats'];
					var name = response[i]['name'];
					var checkbox_ref1 = response[i]['checkbox_ref1'];
					var checkbox_ref2 = response[i]['checkbox_ref2'];
					var checkbox_ref3 = response[i]['checkbox_ref3'];
					var today = new Date();
					var n = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);

					content += "<tr>";
					content += "<td><input type ='checkbox' class='checkboxjobs' name='checkboxjobs' value='" + id + "' ></td>";
					if (n > jobs_sched_date) {
						content += "<td><button onclick='editJob("+i+")' type='button'  class='btn btn-danger btn-xs job_modal' target-id='" + id + "'>" + jobs_sched_date + "</button></td>";
					} else {
						content += "<td><button onclick='editJob("+i+")' type='button'  class='btn btn-success btn-xs job_modal' target-id='" + id + "'>" + jobs_sched_date + "</button></td>";
					}
					content += "<td>worksheet</td>";
					content += "<td>start</td>";


					if (checkbox_ref2 == 1) {
						content += "<td>1</td>";
					} else {
						content += "<td></td>";
					}

					if (checkbox_ref3 == 1) {
						content += "<td>1</td>";
					} else {
						content += "<td></td>";
					}
					if (checkbox_jobs_invoice == 1) {
						content += "<td>1</td>";
					} else {
						content += "<td></td>";
					}

					content += "<td>" + job_ref + "</td>";
					content += "<td>" + cust_ref + "</td>";
					content += "<td>" + cust_address1 + "</td>";
					content += "<td>" + name + "</td>";
					content += "<td></td>";

					if (one_off == '') {
						content += "<td></td>";
					} else {
						content += "<td>one off</td>";
					}
					content += "<td>" + jobs_price1 + "</td>";
					content += "<td>balance</td>";

					if (checkbox_ref1 == 1) {
						content += "<td>Quote</td>";
					} else {
						content += "<td></td>";
					}
					content += "<td>" + my_round + "</td>";
					content += "<td>4</td>";
					content += "<td><a class='btn btn-success btn-xs'>Active</a></td>";

					content += "</tr>";


				}
				// $('#jobs_table').dataTable().fnDestroy();
				// $('#jobs_table thead').empty();
				// $('#jobs_table tbody').empty();
				$('#jobs_table thead').append(header);
				$('#jobs_table tbody').append(content);
				$('#jobs_table').dataTable({
					"ordering": false, // true or false
					"pagingType": 'simple_numbers',// numbers - simple - simple_numbers - full - full_numbers - first_last_numbers
					"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
					"lengthChange": true,
					"displayLength": 10,
					"autoWidth": false,
					"searching": false,
					"responsive": true,
					"bLengthChange": true,
					"bInfo": true,
					"dom": 'Blfrtip',
					'columnDefs':
						[{
							'targets': [0], /* column index */
							'orderable': false, /* true or false */
						}]
				});
			}
		}
		// $('#jobs_table').dataTable().fnDestroy();
		// $('#jobs_table tbody').empty();
		// $('#userPurchaseTblFromCusPage').dataTable({
		//                 "ordering": true, // true or false
		//                 "pagingType": 'simple_numbers',// numbers - simple - simple_numbers - full - full_numbers - first_last_numbers
		//                 "lengthMenu": [[10, 25, 50, -1], [10,25, 50, "All"]],
		//                 "displayLength": 10,
		//                 "autoWidth" : false,
		//                 "responsive": true,
		//                 "bLengthChange": true,
		//                 "bInfo": true,
		//                 "dom":'Blfrtip',
		//                 'columnDefs': 
		//                 [{
		//                   'targets': [0], 
		//                   'orderable': false, 
		//                 }]
		//               });
	});



	// end  POPULATE TABLE ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	// onkeyup/onblur validate if name is already exist

	$('#cust_fname').on('blur', function () {
		var cust_fname = $("#cust_fname").val();
		var cust_lname = $("#cust_lname").val();

		$.ajax({
			url: "php_queries/validate_fullname.php",
			type: 'GET',
			data: { cust_fname: cust_fname, cust_lname: cust_lname },
			dataType: 'json',
			success: function (response) {
				if (response == 1) {
					document.getElementById("cust_fname").style.borderColor = "red";
					document.getElementById("cust_lname").style.borderColor = "red";
				} else {
					document.getElementById("cust_fname").style.borderColor = "lightgray";
					document.getElementById("cust_lname").style.borderColor = "lightgray";

				}
			}
		});




	});

	$('#cust_lname').on('blur', function () {
		var cust_fname = $("#cust_fname").val();
		var cust_lname = $("#cust_lname").val();

		$.ajax({
			url: "php_queries/validate_fullname.php",
			type: 'GET',
			data: { cust_fname: cust_fname, cust_lname: cust_lname },
			dataType: 'json',
			success: function (response) {
				if (response == 1) {
					document.getElementById("cust_lname").style.borderColor = "red";
					document.getElementById("cust_fname").style.borderColor = "red";

				} else {

					document.getElementById("cust_lname").style.borderColor = "lightgray";
					document.getElementById("cust_fname").style.borderColor = "lightgray";
				}
			}
		});




	});

	$('.selectAll').click(function (e) {
		var table = $(e.target).closest('table');
		$('td input:checkbox', table).attr('checked', e.target.checked);
	});

	// start check all checkbox 

	// $("#selectAll").change(function() {
	// 	if (this.checked) {
	// 		$(".checkboxjobs").each(function() {
	// 			this.checked=true;
	// 		});
	// 	} else {
	// 		$(".checkboxjobs").each(function() {
	// 			this.checked=false;
	// 		});
	// 	}
	// });


	$("#test").change(function () {
		var column = $(this).val();
		alert(column);
		if (column == '') {
			$(".done").show();

		} else {
			$(".done").hide();

		}

	});
	// end check all checkbox 

	$("#done").click(function () {
		var val = $('#test').val();
		var filter_round = $('#filter_round').val();
		var filter_service = $('#filter_service').val();
		var filter_due_dates = $('#filter_due_dates').val();
		var filter_due_date_from = $('#filter_due_date_from').val();
		var filter_due_date_to = $('#filter_due_date_to').val();
		var filter_quote = $('#filter_quote').val();
		var checkboxjdate = $('.jobs_d').is(":checked");

		if (val == '') {  // this default columns or columns should not be empty
			toastr.warning('Message : Column Values Cant be empty!');

		} else {
			if (checkboxjdate) {

				$.ajax({
					url: "php_queries/asd.php?columns=1",
					type: 'GET',
					data: {
						val: val,
						filter_round: filter_round,
						filter_service: filter_service,
						filter_due_dates: filter_due_dates,
						filter_due_date_from: filter_due_date_from,
						filter_due_date_to: filter_due_date_to,
						filter_quote: filter_quote,
					},
					dataType: 'json',
					success: function (response) {
						if (response) {
							var len = response.length;
							content = "";
							var today = new Date();
							var n = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
							for (var i = 0; i < len; i++) {
								var jobs_sched_date = response[i]['jobs_sched_date'];
								var job_ref = response[i]['job_ref'];
								var cust_ref = response[i]['cust_ref'];
								var cust_address1 = response[i]['cust_address1'];
								var cust_address2 = response[i]['cust_address2'];
								var cust_town = response[i]['cust_town'];
								var cust_country = response[i]['cust_country'];
								var cust_postcode = response[i]['cust_postcode'];
								var cust_fname = response[i]['cust_fname'];
								var cust_lname = response[i]['cust_lname'];
								var cust_phone = response[i]['cust_phone'];
								var cust_mobile = response[i]['cust_mobile'];
								var cust_email = response[i]['cust_email'];
								var one_off = response[i]['d_w_m_option1'];
								var jobs_price1 = response[i]['jobs_price1'];
								var my_round = response[i]['my_round'];
								var job_id = response[i]['job_id'];
								var stats = response[i]['stats'];
								var checkbox_ref2 = response[i]['checkbox_ref2'];
								var checkbox_ref3 = response[i]['checkbox_ref3'];
								var checkbox_jobs_invoice = response[i]['checkbox_jobs_invoice'];
								var checkbox_ref1 = response[i]['checkbox_ref1'];
								var name = response[i]['name'];


								content += "<tr>";
								content += "<td><input type ='checkbox' class='checkboxjobs' name='nom' value='" + job_id + "'></td>";
								if (n > jobs_sched_date) {
									content += "<td><button onclick='editJob("+i+")' type='button'  class='btn btn-danger btn-xs job_modal' target-id='" + job_id + "'>" + jobs_sched_date + "</button></td>";
								} else {
									content += "<td><button onclick='editJob("+i+")' type='button'  class='btn btn-success btn-xs job_modal' target-id='" + job_id + "'>" + jobs_sched_date + "</button></td>";
								}
								content += "<td>Worksheet</td>";
								content += "<td>New</td>";
								if (checkbox_ref2 == 1) {
									content += "<td>1</td>";
								} else {
									content += "<td></td>";
								}

								if (checkbox_ref3 == 1) {
									content += "<td>1</td>";
								} else {
									content += "<td></td>";
								}

								if (checkbox_jobs_invoice == 1) {
									content += "<td>1</td>";
								} else {
									content += "<td></td>";
								}
								if (job_ref == 'no') {
								} else {
									content += "<td>" + job_ref + "</td>";
								}
								if (cust_ref == 'no') {
								} else {
									content += "<td>" + cust_ref + "</td>";
								}
								if (cust_address1 == 'no') {
								} else {
									content += "<td>" + cust_address1 + "</td>";
								}
								if (cust_address2 == 'no') {
								} else {
									content += "<td>" + cust_address2 + "</td>";
								}
								if (name == 'no') {
								} else {
									content += "<td>" + name + "</td>";
								}
								content += "<td></td>";
								if (cust_town == 'no') {
								} else {
									content += "<td>" + cust_town + "</td>";
								}
								if (cust_country == 'no') {
								} else {
									content += "<td>" + cust_country + "</td>";
								}
								if (cust_postcode == 'no') {
								} else {
									content += "<td>" + cust_postcode + "</td>";
								}
								if (cust_phone == 'no') {
								} else {
									content += "<td>" + cust_phone + "</td>";
								}
								if (cust_mobile == 'no') {
								} else {
									content += "<td>" + cust_mobile + "</td>";
								}
								if (cust_email == 'no') {
								} else {
									content += "<td>" + cust_email + "</td>";
								}
								if (one_off == 'no') {
								} else {
									content += "<td>" + one_off + "</td>";
								}
								if (jobs_price1 == 'no') {
								} else {
									content += "<td>" + jobs_price1 + "</td>";
								}
								if (my_round == 'no') {
								} else {
									content += "<td>" + my_round + "</td>";
								}
								if (stats == 'no') {
								} else {
									content += "<td><a class='btn btn-success btn-xs'>Active</a></td>";
								}

								content += "</tr> ";
							}


							header = "";
							header += "<tr>";
							header += "<th><input type='checkbox' class='selectAll' ></th>";
							header += "<th>Due</th>";
							header += "<th>Worksheet</th>";
							header += "<th>New</th>";
							header += "<th><i class='fa fa-fw fa-exclamation-circle' title='Important'></i></th>";
							header += "<th><i class='fa fa-fw fa-bell' title='Reminder'></i></th>";
							header += "<th><i class='fa fa-fw fa-folder' title='Requires Invoice'></i></th>";
							if (job_ref == 'no') {
							} else {
								header += "<th>Job Ref</th>";
							}
							if (cust_ref == 'no') {
							} else {
								header += "<th>Cust Ref</th>";
							}
							if (cust_address1 == 'no') {
							} else {
								header += "<th>Address 1</th>";
							}
							if (cust_address2 == 'no') {
							} else {
								header += "<th>Address 2</th>";
							}
							if (name == 'no') {
							} else {
								header += "<th>Name</th>";
							}
							header += "<th><i class='fa fa-fw fa-envelope'></i></th>";
							if (cust_town == 'no') {
							} else {
								header += "<th>Town</th>";
							}
							if (cust_country == 'no') {
							} else {
								header += "<th>Country</th>";
							}
							if (cust_postcode == 'no') {
							} else {
								header += "<th>Postcode</th>";
							}
							if (cust_phone == 'no') {
							} else {
								header += "<th>Phone</th>";
							}
							if (cust_mobile == 'no') {
							} else {
								header += "<th>Mobile</th>";
							}
							if (cust_email == 'no') {
							} else {
								header += "<th>Email</th>";
							}
							if (one_off == 'no') {
							} else {
								header += "<th>Schedule</th>";
							}
							if (jobs_price1 == 'no') {
							} else {
								header += "<th>Price</th>";
							}
							if (my_round == 'no') {
							} else {
								header += "<th>Round</th>";
							}
							if (stats == 'no') {
							} else {
								header += "<th>Status</th>";
							}
							header += "</tr> ";

							$('#jobs_table').dataTable().fnDestroy();
							$('#jobs_table thead').empty();
							$('#jobs_table tbody').empty();

							$('#jobs_table thead').append(header);
							$('#jobs_table tbody').append(content);
							$('#jobs_table').dataTable({
								"ordering": false, // true or false
								"pagingType": 'simple_numbers',// numbers - simple - simple_numbers - full - full_numbers - first_last_numbers
								"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
								"lengthChange": true,
								"displayLength": 10,
								"autoWidth": false,
								"searching": false,
								"responsive": true,
								"bLengthChange": true,
								"bInfo": true,
								"dom": 'Blfrtip',
								'columnDefs':
									[{
										'targets': [0], /* column index */
										'orderable': false, /* true or false */
									}]
							});




						} else {

							toastr.warning('Message : Please Check " Due " option');
						}

					}
				});

			} else {
				toastr.warning('Message : Please Check " Due " option');

			}
		}

	});




	// $(".job_modal").click(function () {
	// 	$('#edit_job_modal').modal('show');
	// });

	// start edit profile	
	$("#edit_profile_modal").click(function () {
		var user_id = $('#user_id').val();
		$.ajax({
			url: "php_queries/get_profile.php?",
			type: 'GET',
			data: { user_id: user_id },
			dataType: 'json',
			success: function (response) {
				if (response) {
					var len = response.length;
					for (var i = 0; i < len; i++) {
						var lname = response[i]['lname'];
						var fname = response[i]['fname'];
						$("#edit_fname").val(fname);
						$("#edit_lname").val(lname);
					}
					$('#modal-default-edit-profile').modal('show');

				}
			}
		});




	});

	$("#edit_profile").click(function () {

		var user_id = $('#user_id').val();
		var fname = $('#edit_fname').val();
		var lname = $('#edit_lname').val();
		var password = $('#edit_password').val();

		$.ajax({
			url: "php_queries/update_profile.php?",
			type: 'GET',
			data: { fname: fname, lname: lname, password: password, user_id: user_id },
			dataType: 'json',
			success: function (response) {
				if (response == 1) {
					toastr.success('Success : Profile Update');

				} else {
					toastr.warning('Message : Data Error Occured!');

				}
			}
		});

	});
	// end edit profile


	// start dropdown POPULATE ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	$("#add_job").click(function () { 							//dropdown populate SOURCE
		var cust_fname = $("#cust_fname").val();
		var cust_lname = $("#cust_lname").val();

		$.ajax({
			url: "php_queries/validate_fullname.php",
			type: 'GET',
			data: { cust_fname: cust_fname, cust_lname: cust_lname },
			dataType: 'json',
			success: function (response) {
				if (response == 1) {
					document.getElementById("cust_fname").style.borderColor = "red";
					document.getElementById("cust_lname").style.borderColor = "red";
				} else {
					document.getElementById("cust_fname").style.borderColor = "lightgray";
					document.getElementById("cust_lname").style.borderColor = "lightgray";

				}
			}
		});

		$.ajax({
			url: "php_queries/get_source.php",
			type: 'GET',
			dataType: 'json',
			success: function (response) {
				if (response) {
					var len = response.length;
					for (var i = 0; i < len; i++) {

						var source = response[i]['source'];
						$("#source_dropdown").append("<option value='" + source + "'>" + source + " </option>");

					}
				}
			}
		});

		$.ajax({
			url: "php_queries/get_round.php",					//dropdown populate ROUND 
			type: 'GET',
			dataType: 'json',
			success: function (response) {
				if (response) {
					var len = response.length;
					for (var i = 0; i < len; i++) {

						var round = response[i]['round'];
						$("#my_round").append("<option value='" + round + "'>" + round + " </option>");

					}
				}
			}
		});

		$.ajax({
			url: "php_queries/get_service.php",					//dropdown populate SERVICE 
			type: 'GET',
			dataType: 'json',
			success: function (response) {
				if (response) {
					var len = response.length;
					for (var i = 0; i < len; i++) {

						var service = response[i]['service'];
						$("#window_cleaning").append("<option value='" + service + "'>" + service + " </option>");

					}
				}
			}
		});


		$.ajax({
			url: "php_queries/get_payment.php",					//dropdown populate SERVICE 
			type: 'GET',
			dataType: 'json',
			success: function (response) {
				if (response) {
					var len = response.length;
					for (var i = 0; i < len; i++) {

						var payment = response[i]['payment'];
						$("#payment_method").append("<option value='" + payment + "'>" + payment + " </option>");

					}
				}
			}
		});




	});

	// end dropdown POPULATE ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


	// start SOURCE ADD APPEND ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	$("#button_add_source").click(function () {						//append after add
		var add_source = $("#field_add_source").val();
		var user = $("#user").val();


		$.ajax({
			url: "php_queries/save_source.php",
			type: 'GET',
			data: { add_source: add_source, user: user },
			dataType: 'json',
			success: function (response) {
				if (response) {
					toastr.success('Success : Data Inserted')
					$("#source_dropdown").append("<option value='" + response + "'>" + response + " </option>");

					$('#modal-default').modal('hide');
					$("#field_add_source").val('');
				} else {
					toastr.warning('Message : Data Error Occured!')

				}
			}
		});

	});

	// end  SOURCE ADD APPEND ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


	// start  ROUNDS  ADD APPEND ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	// start SOURCE ADD APPEND ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	$("#button_add_service").click(function () {						//append after add
		var field_add_service = $("#field_add_service").val();
		var user = $("#user").val();


		$.ajax({
			url: "php_queries/save_service.php",
			type: 'GET',
			data: { field_add_service: field_add_service, user: user },
			dataType: 'json',
			success: function (response) {
				if (response) {
					toastr.success('Success : Data Inserted')
					$("#window_cleaning").append("<option value='" + response + "'>" + response + " </option>");

					$('#modal-default2').modal('hide');
					$("#field_add_service").val('');
				} else {
					toastr.warning('Message : Data Error Occured!')

				}
			}
		});

	});

	// end  ROUNDS ADD APPEND ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	$("#button_add_round").click(function () {						//append after add
		var jobs_round = $("#field_add_round").val();
		var user = $("#user").val();

		var checkbox_jround = $('#checkbox_jround').is(":checked");
		if (checkbox_jround) {
			var val = 1;

		} else {
			var val = 2;
		}


		$.ajax({
			url: "php_queries/save_round.php",
			type: 'GET',
			data: { jobs_round: jobs_round, user: user, val: val },
			dataType: 'json',
			success: function (response) {
				if (response) {
					toastr.success('Success : Data Inserted')
					$("#my_round").append("<option value='" + response + "'>" + response + " </option>");

					$('#modal-default1').modal('hide');
					$("#field_add_round").val('');
				} else {
					toastr.warning('Message : Data Error Occured!')

				}
			}
		});

	});

	// end ROUNDS ADD APPEND ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



	// end  PAYMENT ADD APPEND ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	$("#button_payment_add").click(function () {						//append after add
		var field_payment_add = $("#field_payment_add").val();
		var user = $("#user").val();

		var checkbox_payment = $('#checkbox_payment').is(":checked");
		if (checkbox_payment) {
			var val = 1;

		} else {
			var val = 2;
		}


		$.ajax({
			url: "php_queries/save_payment.php",
			type: 'GET',
			data: { field_payment_add: field_payment_add, user: user, val: val },
			dataType: 'json',
			success: function (response) {
				if (response) {
					toastr.success('Success : Data Inserted')
					$("#payment_method").append("<option value='" + response + "'>" + response + " </option>");

					$('#modal-default3').modal('hide');
					$("#field_payment_add").val('');
				} else {
					toastr.warning('Message : Data Error Occured!')

				}
			}
		});

	});

	// end PAYMENT ADD APPEND ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++






	$(".exist_cust").click(function () {
		$("#modal_one_part1").hide();
		$("#show_exist_cust_fields").show();
		$('.on_check_job_diff').hide();
		document.getElementById("checkbox_job_diff").checked = false;

		var user = $("#user").val();
		$.ajax({
			url: "php_queries/get_customer.php",					//dropdown populate SERVICE 
			type: 'GET',
			data: { user: user },
			dataType: 'json',
			success: function (response) {
				if (response) {
					var len = response.length;
					$("#customer_dropdown").empty();
					$("#customer_dropdown")
						.append("<option selected disabled></option>");
					for (var i = 0; i < len; i++) {

						var id = response[i]['id'];
						var cust_fname = response[i]['cust_fname'];
						var cust_lname = response[i]['cust_lname'];
						var customer = cust_fname + " " + cust_lname;
						$("#customer_dropdown")
							.append("<option value='" + id + "'>" + customer + " </option>");

					}
				}
			}
		});


	});

	$(".new_cust").click(function () {
		$("#modal_one_part1").show();
		$("#show_exist_cust_fields").hide();
		$('.on_check_job_diff').hide();

	});

	$(".new_cust_diff").click(function () {
		$("#modal_one_part1").show();
		$("#show_exist_cust_fields").hide();
		$('.on_check_job_diff').show();

	});

	// start CHECKBOX ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// $('#selectAll').click(function(e){
	// 	var table= $(e.target).closest('table');
	// 	$('td input:checkbox',table).attr('checked',e.target.checked);
	// });

	$('#auto_select').on('click', function () {

		$("#show_auto_select_field").show();


	});



	$('#checkbox_job_diff').on('click', function () {
		var checkbox = $(this);
		// var div = checkbox.data('name');

		if (checkbox.is(':checked')) {
			$('.on_check_job_diff').show();
		} else {
			$('.on_check_job_diff').hide();
		}
	});



	$('#no_due').on('click', function () {
		var checkbox = $(this);
		// var div = checkbox.data('name');

		if (checkbox.is(':checked')) {
			$('#jobs_sched_date_col').hide();
			$('#jobs_sched_date').val('');
		} else {
			$('#jobs_sched_date_col').show();
		}
	});

	$('#sched_checkbox').on('click', function () {
		var checkbox = $(this);
		// var div = checkbox.data('name');

		if (checkbox.is(':checked')) {
			$('.one_off').hide();
			$('#number_d_w_m').val('');
			$('#d_w_m_option1').val('');
			$('#d_w_m_option2').val('');
		} else {
			$('.one_off').show();
		}
	});


	// end CHECKBOX ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


	// START SAVING THE JOB ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	// if new customer is tick
	$('#save_job').on('click', function () {
		var new_cust = $('.new_cust').is(":checked");
		if (new_cust) {

			var cust_ref = $('#cust_ref').val();
			var source_dropdown = $('#source_dropdown').val();
			var source_dropdown = $('#source_dropdown').val();
			var cust_title = $('#cust_title').val();
			var cust_fname = $('#cust_fname').val();
			var cust_lname = $('#cust_lname').val();
			var cust_company = $('#cust_company').val();
			var cust_address1 = $('#cust_address1').val();
			var cust_address2 = $('#cust_address2').val();
			var cust_town = $('#cust_town').val();
			var cust_country = $('#cust_country').val();
			var cust_postcode = $('#cust_postcode').val();
			var cust_mobile = $('#cust_mobile').val();
			var cust_phone = $('#cust_phone').val();
			var cust_email = $('#cust_email').val();
			var job_ref = $('#job_ref').val();

			var checkbox_ref1 = $('#checkbox_ref1').is(":checked");
			if (checkbox_ref1) {
				var checkbox_ref1 = 1;
			} else {
				var checkbox_ref1 = 2;
			}
			var checkbox_ref2 = $('#checkbox_ref2').is(":checked");
			if (checkbox_ref2) {
				var checkbox_ref2 = 1;
			} else {
				var checkbox_ref2 = 2;
			}
			var checkbox_ref3 = $('#checkbox_ref3').is(":checked");
			if (checkbox_ref3) {
				var checkbox_ref3 = 1;
			} else {
				var checkbox_ref3 = 2;
			}
			var my_round = $('#my_round').val();
			var window_cleaning = $('#window_cleaning').val();
			var job_hrs = $('#job_hrs').val();
			var job_mins = $('#job_mins').val();
			var job_ppl = $('#job_ppl').val();

			var no_due = $('#no_due').is(":checked");
			if (no_due) {
				var jobs_sched_date = '';
			} else {
				var jobs_sched_date = $('#jobs_sched_date').val();
			}
			var sched_checkbox = $('#sched_checkbox').is(":checked");
			if (no_due) {
				var number_d_w_m = '';
				var d_w_m_option1 = '';
				var d_w_m_option2 = '';
			} else {
				var number_d_w_m = $('#number_d_w_m').val();
				var d_w_m_option1 = $('#d_w_m_option1').val();
				var d_w_m_option2 = $('#d_w_m_option2').val();
			}
			var jobs_price1 = $('#jobs_price1').val();
			var per_jobs = $('#per_jobs').val();
			var jobs_price2 = $('#jobs_price2').val();
			var jobs_price3 = $('#jobs_price3').val();

			var checkbox_job_price = $('#sched_checkbox').is(":checked");

			if (checkbox_job_price) {
				var checkbox_job_price = 1;
			} else {
				var checkbox_job_price = 2;

			}
			var payment_method = $('#payment_method').val();

			var checkbox_jobs_invoice = $('#checkbox_jobs_invoice').is(":checked");

			if (checkbox_jobs_invoice) {
				var checkbox_jobs_invoice = 1;
			} else {
				var checkbox_jobs_invoice = 2;

			}

			var job_notes = $('#job_notes').val();
			var checkbox_notes = $('#checkbox_notes').is(":checked");

			if (checkbox_notes) {
				var checkbox_notes = 1;
			} else {
				var checkbox_notes = 2;

			}

			var user = $("#user").val();

			$.ajax({
				url: "php_queries/save_form1.php",					//dropdown populate SERVICE 
				type: 'GET',
				data: {
					user: user,
					cust_ref: cust_ref,
					source_dropdown: source_dropdown,
					cust_title: cust_title,
					cust_fname: cust_fname,
					cust_lname: cust_lname,
					cust_company: cust_company,
					cust_address1: cust_address1,
					cust_address2: cust_address2,
					cust_town: cust_town,
					cust_country: cust_country,
					cust_postcode: cust_postcode,
					cust_mobile: cust_mobile,
					cust_phone: cust_phone,
					cust_email: cust_email,
					job_ref: job_ref,
					checkbox_ref1: checkbox_ref1,
					checkbox_ref2: checkbox_ref2,
					checkbox_ref3: checkbox_ref3,
					my_round: my_round,
					window_cleaning: window_cleaning,
					job_hrs: job_hrs,
					job_mins: job_mins,
					job_ppl: job_ppl,
					jobs_sched_date: jobs_sched_date,
					number_d_w_m: number_d_w_m,
					d_w_m_option1: d_w_m_option1,
					d_w_m_option2: d_w_m_option2,
					jobs_price1: jobs_price1,
					per_jobs: per_jobs,
					jobs_price2: jobs_price2,
					jobs_price3: jobs_price3,
					checkbox_job_price: checkbox_job_price,
					payment_method: payment_method,
					checkbox_jobs_invoice: checkbox_jobs_invoice,
					job_notes: job_notes,
					checkbox_notes: checkbox_notes,
				},

				dataType: 'json',
				success: function (response) {
					if (response) {
						toastr.success('Success : Data Inserted')

						$('#job_notes').val('');
						$('#payment_method').val('');

						$('#jobs_price1').val('');
						$('#per_jobs').val('');
						$('#jobs_price2').val('');
						$('#jobs_price3').val('');
						$('#number_d_w_m').val('');
						$('#d_w_m_option1').val('');
						$('#d_w_m_option2').val('');
						$('#jobs_sched_date').val('');
						$('#my_round').val('');
						$('#window_cleaning').val('');
						$('#job_hrs').val('');
						$('#job_mins').val('');
						$('#job_ppl').val('');
						$('#cust_ref').val('');
						$('#source_dropdown').val('');
						$('#source_dropdown').val('');
						$('#cust_title').val('');
						$('#cust_fname').val('');
						$('#cust_lname').val('');
						$('#cust_company').val('');
						$('#cust_address1').val('');
						$('#cust_address2').val('');
						$('#cust_town').val('');
						$('#cust_country').val('');
						$('#cust_postcode').val('');
						$('#cust_mobile').val('');
						$('#cust_phone').val('');
						$('#cust_email').val('');
						$('#job_ref').val('');


						document.getElementById("checkbox_ref1").checked = false;
						document.getElementById("checkbox_ref2").checked = false;
						document.getElementById("checkbox_ref3").checked = false;
						document.getElementById("sched_checkbox").checked = false;
						document.getElementById("checkbox_job_price").checked = false;
						document.getElementById("checkbox_jobs_invoice").checked = false;
						document.getElementById("checkbox_notes").checked = false;
						document.getElementById("no_due").checked = false;


						var sched_checkbox = $('#sched_checkbox').is(":checked");
						if (sched_checkbox) {

						} else {
							$('.one_off').show();

						}

						var no_due = $('#no_due').is(":checked");
						if (no_due) {
						} else {
							$('#jobs_sched_date_col').show();

						}

						//append to table
						content = "";
						if (response) {
							var len = response.length;
							for (var i = 0; i < len; i++) {
								var id = response[i]['id'];
								var jobs_sched_date = response[i]['jobs_sched_date'];
								var job_notes = response[i]['job_notes'];
								var job_ref = response[i]['job_ref'];
								var cust_ref = response[i]['cust_ref'];
								var cust_address1 = response[i]['cust_address1'];
								var one_off = response[i]['number_d_w_m'];
								var jobs_price1 = response[i]['jobs_price1'];
								var jobs_balance = response[i]['jobs_balance'];
								var my_round = response[i]['my_round'];
								var stats = response[i]['stats'];
								var name = response[i]['name'];
								var checkbox_ref1 = response[i]['checkbox_ref1'];
								var checkbox_ref2 = response[i]['checkbox_ref2'];
								var checkbox_ref3 = response[i]['checkbox_ref3'];
								var today = new Date();
								var n = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);

								content += "<tr>";
								content += "<td><input type ='checkbox' class='checkboxjobs' name='checkboxjobs' data-id='" + id + "'></td>";
								if (jobs_sched_date == "") {
									var jobs_sched_date = '0000-00-00';
								}
								if (n > jobs_sched_date) {
									content += "<td><button onclick='editJob("+i+")' type='button' class='btn btn-danger btn-xs job_modal' target-id='" + job_id + "'>" + jobs_sched_date + "</button></td>";
								} else {
									content += "<td><button onclick='editJob("+i+")' type='button' class='btn btn-success btn-xs job_modal' target-id='" + job_id + "'>" + jobs_sched_date + "</button></td>";
								}
								content += "<td>worksheet</td>";
								content += "<td>start</td>";


								if (checkbox_ref2 == 1) {
									content += "<td>1</td>";
								} else {
									content += "<td></td>";
								}

								if (checkbox_ref3 == 1) {
									content += "<td>1</td>";
								} else {
									content += "<td></td>";
								}
								if (checkbox_jobs_invoice == 1) {
									content += "<td>1</td>";
								} else {
									content += "<td></td>";
								}

								content += "<td>" + job_ref + "</td>";
								content += "<td>" + cust_ref + "</td>";
								content += "<td>" + cust_address1 + "</td>";
								content += "<td>" + name + "</td>";
								content += "<td></td>";

								if (one_off == '') {
									content += "<td></td>";
								} else {
									content += "<td>one off</td>";
								}
								content += "<td>" + jobs_price1 + "</td>";
								content += "<td>balance</td>";

								if (checkbox_ref1 == 1) {
									content += "<td>Quote</td>";
								} else {
									content += "<td></td>";
								}
								content += "<td>" + my_round + "</td>";
								content += "<td>4</td>";
								content += "<td><a class='btn btn-success btn-xs'>Active</a></td>";

								content += "</tr>";


							}
							$('#jobs_table tbody').prepend(content);
						}
					} else {
						toastr.warning('Message : Data Error Occured!')
					}
				}
			});


		}

		// if existing customer is tick
		var exist_cust = $('.exist_cust').is(":checked");
		if (exist_cust) {

			var customer_dropdown = $('#customer_dropdown').val();

			var checkbox_job_diff = $('.exist_cust').is(":checked");
			if (checkbox_job_diff) {
				var job_address1 = $('#job_address1').val();
				var job_address2 = $('#job_address2').val();
				var job_town = $('#job_town').val();
				var job_country = $('#job_country').val();
				var job_postcode = $('#job_postcode').val();

			} else {
				var job_address1 = '';
				var job_address2 = '';
				var job_town = '';
				var job_country = '';
				var job_postcode = '';
			}

			var job_ref = $('#job_ref').val();
			var checkbox_ref1 = $('#checkbox_ref1').is(":checked");
			if (checkbox_ref1) {
				var checkbox_ref1 = 1;
			} else {
				var checkbox_ref1 = 2;
			}
			var checkbox_ref2 = $('#checkbox_ref2').is(":checked");
			if (checkbox_ref2) {
				var checkbox_ref2 = 1;
			} else {
				var checkbox_ref2 = 2;
			}
			var checkbox_ref3 = $('#checkbox_ref3').is(":checked");
			if (checkbox_ref3) {
				var checkbox_ref3 = 1;
			} else {
				var checkbox_ref3 = 2;
			}
			var my_round = $('#my_round').val();
			var window_cleaning = $('#window_cleaning').val();
			var job_hrs = $('#job_hrs').val();
			var job_mins = $('#job_mins').val();
			var job_ppl = $('#job_ppl').val();

			var no_due = $('#no_due').is(":checked");
			if (no_due) {
				var jobs_sched_date = '';
			} else {
				var jobs_sched_date = $('#jobs_sched_date').val();
			}
			var sched_checkbox = $('#sched_checkbox').is(":checked");
			if (no_due) {
				var number_d_w_m = '';
				var d_w_m_option1 = '';
				var d_w_m_option2 = '';
			} else {
				var number_d_w_m = $('#number_d_w_m').val();
				var d_w_m_option1 = $('#d_w_m_option1').val();
				var d_w_m_option2 = $('#d_w_m_option2').val();
			}
			var jobs_price1 = $('#jobs_price1').val();
			var per_jobs = $('#per_jobs').val();
			var jobs_price2 = $('#jobs_price2').val();
			var jobs_price3 = $('#jobs_price3').val();

			var checkbox_job_price = $('#sched_checkbox').is(":checked");

			if (checkbox_job_price) {
				var checkbox_job_price = 1;
			} else {
				var checkbox_job_price = 2;

			}
			var payment_method = $('#payment_method').val();

			var checkbox_jobs_invoice = $('#checkbox_jobs_invoice').is(":checked");

			if (checkbox_jobs_invoice) {
				var checkbox_jobs_invoice = 1;
			} else {
				var checkbox_jobs_invoice = 2;

			}

			var job_notes = $('#job_notes').val();
			var checkbox_notes = $('#checkbox_notes').is(":checked");

			if (checkbox_notes) {
				var checkbox_notes = 1;
			} else {
				var checkbox_notes = 2;

			}
			var user = $("#user").val();

			$.ajax({
				url: "php_queries/save_form2.php",					//dropdown populate SERVICE 
				type: 'GET',
				data: {
					user: user,
					customer_dropdown: customer_dropdown,
					checkbox_job_diff: checkbox_job_diff,
					job_address1: job_address1,
					job_address2: job_address2,
					job_town: job_town,
					job_country: job_country,
					job_postcode: job_postcode,
					job_ref: job_ref,
					checkbox_ref1: checkbox_ref1,
					checkbox_ref2: checkbox_ref2,
					checkbox_ref3: checkbox_ref3,
					my_round: my_round,
					window_cleaning: window_cleaning,
					job_hrs: job_hrs,
					job_mins: job_mins,
					job_ppl: job_ppl,
					jobs_sched_date: jobs_sched_date,
					number_d_w_m: number_d_w_m,
					d_w_m_option1: d_w_m_option1,
					d_w_m_option2: d_w_m_option2,
					jobs_price1: jobs_price1,
					per_jobs: per_jobs,
					jobs_price2: jobs_price2,
					jobs_price3: jobs_price3,
					checkbox_job_price: checkbox_job_price,
					payment_method: payment_method,
					checkbox_jobs_invoice: checkbox_jobs_invoice,
					job_notes: job_notes,
					checkbox_notes: checkbox_notes,
				},

				dataType: 'json',
				success: function (response) {
					if (response) {
						toastr.success('Success : Data Inserted')
						var empty = '';
						$('#job_notes').val('');
						$('#job_ref').val('');
						$('#payment_method').val('');
						$('#jobs_price1').val('');
						$('#per_jobs').val('');
						$('#jobs_price2').val('');
						$('#jobs_price3').val('');
						$('#number_d_w_m').val('');
						$('#d_w_m_option1').val('');
						$('#d_w_m_option2').val('');
						$('#jobs_sched_date').val('');
						$('#my_round').val('');
						$('#window_cleaning').val('');
						$('#job_hrs').val('');
						$('#job_mins').val('');
						$('#job_ppl').val('');
						$('#job_address1').val('');
						$('#job_address2').val('');
						$('#job_town').val('');
						$('#job_country').val('');
						$('#job_postcode').val('');
						var user = $("#user").val();
						$.ajax({
							url: "php_queries/get_customer.php",					//dropdown populate SERVICE 
							type: 'GET',
							data: { user: user },
							dataType: 'json',
							success: function (response) {
								if (response) {
									var len = response.length;
									$("#customer_dropdown").empty();
									$("#customer_dropdown")
										.append("<option selected disabled></option>");
									for (var i = 0; i < len; i++) {

										var id = response[i]['id'];
										var cust_fname = response[i]['cust_fname'];
										var cust_lname = response[i]['cust_lname'];
										var customer = cust_fname + " " + cust_lname;
										$("#customer_dropdown")
											.append("<option value='" + id + "'>" + customer + " </option>");

									}
								}
							}
						});



						document.getElementById("checkbox_job_diff").checked = false;
						document.getElementById("checkbox_ref1").checked = false;
						document.getElementById("checkbox_ref2").checked = false;
						document.getElementById("checkbox_ref3").checked = false;
						document.getElementById("sched_checkbox").checked = false;
						document.getElementById("checkbox_job_price").checked = false;
						document.getElementById("checkbox_jobs_invoice").checked = false;
						document.getElementById("checkbox_notes").checked = false;
						document.getElementById("no_due").checked = false;


						var sched_checkbox = $('#sched_checkbox').is(":checked");
						if (sched_checkbox) {

						} else {
							$('.one_off').show();

						}

						var no_due = $('#no_due').is(":checked");
						if (no_due) {
						} else {
							$('#jobs_sched_date_col').show();

						}

						$('.on_check_job_diff').hide();


						//append to table
						content = "";
						if (response) {
							var len = response.length;
							for (var i = 0; i < len; i++) {
								var id = response[i]['id'];
								var jobs_sched_date = response[i]['jobs_sched_date'];
								var job_notes = response[i]['job_notes'];
								var job_ref = response[i]['job_ref'];
								var cust_ref = response[i]['cust_ref'];
								var cust_address1 = response[i]['cust_address1'];
								var one_off = response[i]['number_d_w_m'];
								var jobs_price1 = response[i]['jobs_price1'];
								var jobs_balance = response[i]['jobs_balance'];
								var my_round = response[i]['my_round'];
								var stats = response[i]['stats'];
								var name = response[i]['name'];
								var checkbox_ref1 = response[i]['checkbox_ref1'];
								var checkbox_ref2 = response[i]['checkbox_ref2'];
								var checkbox_ref3 = response[i]['checkbox_ref3'];
								var today = new Date();
								var n = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);

								content += "<tr>";
								content += "<td><input type ='checkbox' class='checkboxjobs' name='checkboxjobs' data-id='" + id + "'></td>";
								if (jobs_sched_date == "") {
									var jobs_sched_date = '0000-00-00';
								}
								if (n > jobs_sched_date) {
									content += "<td><button onclick='editJob("+i+")' type='button' class='btn btn-danger btn-xs job_modal' target-id='" + job_id + "'>" + jobs_sched_date + "</button></td>";
								} else {
									content += "<td><button onclick='editJob("+i+")' type='button'  class='btn btn-success btn-xs job_modal' target-id='" + job_id + "'>" + jobs_sched_date + "</button></td>";
								}
								content += "<td>worksheet</td>";
								content += "<td>start</td>";


								if (checkbox_ref2 == 1) {
									content += "<td>1</td>";
								} else {
									content += "<td></td>";
								}

								if (checkbox_ref3 == 1) {
									content += "<td>1</td>";
								} else {
									content += "<td></td>";
								}
								if (checkbox_jobs_invoice == 1) {
									content += "<td>1</td>";
								} else {
									content += "<td></td>";
								}

								content += "<td>" + job_ref + "</td>";
								content += "<td>" + cust_ref + "</td>";
								content += "<td>" + cust_address1 + "</td>";
								content += "<td>" + name + "</td>";
								content += "<td></td>";

								if (one_off == '') {
									content += "<td></td>";
								} else {
									content += "<td>one off</td>";
								}
								content += "<td>" + jobs_price1 + "</td>";
								content += "<td>balance</td>";

								if (checkbox_ref1 == 1) {
									content += "<td>Quote</td>";
								} else {
									content += "<td></td>";
								}
								content += "<td>" + my_round + "</td>";
								content += "<td>4</td>";
								content += "<td><a class='btn btn-success btn-xs'>Active</a></td>";

								content += "</tr>";


							}
							$('#jobs_table tbody').prepend(content);
						}



					} else {
						toastr.warning('Message : Data Error Occured!')
					}
				}
			});

		}

		// if new customer diff address is tick
		var new_cust_diff = $('.new_cust_diff').is(":checked");
		if (new_cust_diff) {

			var cust_ref = $('#cust_ref').val();
			var source_dropdown = $('#source_dropdown').val();
			var source_dropdown = $('#source_dropdown').val();
			var cust_title = $('#cust_title').val();
			var cust_fname = $('#cust_fname').val();
			var cust_lname = $('#cust_lname').val();
			var cust_company = $('#cust_company').val();
			var cust_address1 = $('#cust_address1').val();
			var cust_address2 = $('#cust_address2').val();
			var cust_town = $('#cust_town').val();
			var cust_country = $('#cust_country').val();
			var cust_postcode = $('#cust_postcode').val();
			var cust_mobile = $('#cust_mobile').val();
			var cust_phone = $('#cust_phone').val();
			var cust_email = $('#cust_email').val();

			var job_address1 = $('#job_address1').val();
			var job_address2 = $('#job_address2').val();
			var job_town = $('#job_town').val();
			var job_country = $('#job_country').val();
			var job_postcode = $('#job_postcode').val();

			var job_ref = $('#job_ref').val();

			var checkbox_ref1 = $('#checkbox_ref1').is(":checked");
			if (checkbox_ref1) {
				var checkbox_ref1 = 1;
			} else {
				var checkbox_ref1 = 2;
			}
			var checkbox_ref2 = $('#checkbox_ref2').is(":checked");
			if (checkbox_ref2) {
				var checkbox_ref2 = 1;
			} else {
				var checkbox_ref2 = 2;
			}
			var checkbox_ref3 = $('#checkbox_ref3').is(":checked");
			if (checkbox_ref3) {
				var checkbox_ref3 = 1;
			} else {
				var checkbox_ref3 = 2;
			}
			var my_round = $('#my_round').val();
			var window_cleaning = $('#window_cleaning').val();
			var job_hrs = $('#job_hrs').val();
			var job_mins = $('#job_mins').val();
			var job_ppl = $('#job_ppl').val();

			var no_due = $('#no_due').is(":checked");
			if (no_due) {
				var jobs_sched_date = '';
			} else {
				var jobs_sched_date = $('#jobs_sched_date').val();
			}
			var sched_checkbox = $('#sched_checkbox').is(":checked");
			if (no_due) {
				var number_d_w_m = '';
				var d_w_m_option1 = '';
				var d_w_m_option2 = '';
			} else {
				var number_d_w_m = $('#number_d_w_m').val();
				var d_w_m_option1 = $('#d_w_m_option1').val();
				var d_w_m_option2 = $('#d_w_m_option2').val();
			}

			var jobs_price1 = $('#jobs_price1').val();
			var per_jobs = $('#per_jobs').val();
			var jobs_price2 = $('#jobs_price2').val();
			var jobs_price3 = $('#jobs_price3').val();

			var checkbox_job_price = $('#sched_checkbox').is(":checked");

			if (checkbox_job_price) {
				var checkbox_job_price = 1;
			} else {
				var checkbox_job_price = 2;

			}
			var payment_method = $('#payment_method').val();

			var checkbox_jobs_invoice = $('#checkbox_jobs_invoice').is(":checked");

			if (checkbox_jobs_invoice) {
				var checkbox_jobs_invoice = 1;
			} else {
				var checkbox_jobs_invoice = 2;

			}

			var job_notes = $('#job_notes').val();
			var checkbox_notes = $('#checkbox_notes').is(":checked");

			if (checkbox_notes) {
				var checkbox_notes = 1;
			} else {
				var checkbox_notes = 2;

			}

			var user = $("#user").val();

			$.ajax({
				url: "php_queries/save_form3.php",					//dropdown populate SERVICE 
				type: 'GET',
				data: {
					user: user,
					cust_ref: cust_ref,
					source_dropdown: source_dropdown,
					cust_title: cust_title,
					cust_fname: cust_fname,
					cust_lname: cust_lname,
					cust_company: cust_company,
					cust_address1: cust_address1,
					cust_address2: cust_address2,
					cust_town: cust_town,
					cust_country: cust_country,
					cust_postcode: cust_postcode,
					cust_mobile: cust_mobile,
					cust_phone: cust_phone,
					cust_email: cust_email,
					job_address1: job_address1,
					job_address2: job_address2,
					job_town: job_town,
					job_country: job_country,
					job_postcode: job_postcode,
					job_ref: job_ref,
					checkbox_ref1: checkbox_ref1,
					checkbox_ref2: checkbox_ref2,
					checkbox_ref3: checkbox_ref3,
					my_round: my_round,
					window_cleaning: window_cleaning,
					job_hrs: job_hrs,
					job_mins: job_mins,
					job_ppl: job_ppl,
					jobs_sched_date: jobs_sched_date,
					number_d_w_m: number_d_w_m,
					d_w_m_option1: d_w_m_option1,
					d_w_m_option2: d_w_m_option2,
					jobs_price1: jobs_price1,
					per_jobs: per_jobs,
					jobs_price2: jobs_price2,
					jobs_price3: jobs_price3,
					checkbox_job_price: checkbox_job_price,
					payment_method: payment_method,
					checkbox_jobs_invoice: checkbox_jobs_invoice,
					job_notes: job_notes,
					checkbox_notes: checkbox_notes,
				},

				dataType: 'json',
				success: function (response) {
					if (response) {
						toastr.success('Success : Data Inserted')
						$('#cust_ref').val('');
						$('#source_dropdown').val('');
						$('#source_dropdown').val('');
						$('#cust_title').val('');
						$('#cust_fname').val('');
						$('#cust_lname').val('');
						$('#cust_company').val('');
						$('#cust_address1').val('');
						$('#cust_address2').val('');
						$('#cust_town').val('');
						$('#cust_country').val('');
						$('#cust_postcode').val('');
						$('#cust_mobile').val('');
						$('#cust_phone').val('');
						$('#cust_email').val('');

						$('#job_address1').val('');
						$('#job_address2').val('');
						$('#job_town').val('');
						$('#job_country').val('');
						$('#job_postcode').val('');


						$('#job_ref').val('');
						$('#my_round').val('');
						$('#window_cleaning').val('');
						$('#job_hrs').val('');
						$('#job_mins').val('');
						$('#job_ppl').val('');

						$('#number_d_w_m').val('');
						$('#d_w_m_option1').val('');
						$('#d_w_m_option2').val('');
						$('#jobs_price1').val('');
						$('#per_jobs').val('');
						$('#jobs_price2').val('');
						$('#jobs_price3').val('');
						$('#payment_method').val('');
						$('#job_notes').val('');
						$('#jobs_sched_date').val('');

						document.getElementById("checkbox_ref1").checked = false;
						document.getElementById("checkbox_ref2").checked = false;
						document.getElementById("checkbox_ref3").checked = false;
						document.getElementById("sched_checkbox").checked = false;
						document.getElementById("checkbox_job_price").checked = false;
						document.getElementById("checkbox_jobs_invoice").checked = false;
						document.getElementById("checkbox_notes").checked = false;
						document.getElementById("no_due").checked = false;


						var sched_checkbox = $('#sched_checkbox').is(":checked");
						if (sched_checkbox) {

						} else {
							$('.one_off').show();

						}

						var no_due = $('#no_due').is(":checked");
						if (no_due) {
						} else {
							$('#jobs_sched_date_col').show();

						}

						//append to table
						content = "";
						if (response) {
							var len = response.length;
							for (var i = 0; i < len; i++) {
								var id = response[i]['id'];
								var jobs_sched_date = response[i]['jobs_sched_date'];
								var job_notes = response[i]['job_notes'];
								var job_ref = response[i]['job_ref'];
								var cust_ref = response[i]['cust_ref'];
								var cust_address1 = response[i]['cust_address1'];
								var one_off = response[i]['number_d_w_m'];
								var jobs_price1 = response[i]['jobs_price1'];
								var jobs_balance = response[i]['jobs_balance'];
								var my_round = response[i]['my_round'];
								var stats = response[i]['stats'];
								var name = response[i]['name'];
								var checkbox_ref1 = response[i]['checkbox_ref1'];
								var checkbox_ref2 = response[i]['checkbox_ref2'];
								var checkbox_ref3 = response[i]['checkbox_ref3'];
								var today = new Date();
								var n = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);

								content += "<tr>";
								content += "<td><input type ='checkbox' class='checkboxjobs' name='checkboxjobs' data-id='" + id + "'></td>";
								if (jobs_sched_date == "") {
									var jobs_sched_date = '0000-00-00';
								}
								if (n > jobs_sched_date) {
									content += "<td><button onclick='editJob("+i+")' type='button' class='btn btn-danger btn-xs job_modal' target-id='" + job_id + "'>" + jobs_sched_date + "</button></td>";
								} else {
									content += "<td><button onclick='editJob("+i+")' type='button'  class='btn btn-success btn-xs job_modal' target-id='" + job_id + "'>" + jobs_sched_date + "</button></td>";
								}
								content += "<td>worksheet</td>";
								content += "<td>start</td>";


								if (checkbox_ref2 == 1) {
									content += "<td>1</td>";
								} else {
									content += "<td></td>";
								}

								if (checkbox_ref3 == 1) {
									content += "<td>1</td>";
								} else {
									content += "<td></td>";
								}
								if (checkbox_jobs_invoice == 1) {
									content += "<td>1</td>";
								} else {
									content += "<td></td>";
								}

								content += "<td>" + job_ref + "</td>";
								content += "<td>" + cust_ref + "</td>";
								content += "<td>" + cust_address1 + "</td>";
								content += "<td>" + name + "</td>";
								content += "<td></td>";

								if (one_off == '') {
									content += "<td></td>";
								} else {
									content += "<td>one off</td>";
								}
								content += "<td>" + jobs_price1 + "</td>";
								content += "<td>balance</td>";

								if (checkbox_ref1 == 1) {
									content += "<td>Quote</td>";
								} else {
									content += "<td></td>";
								}
								content += "<td>" + my_round + "</td>";
								content += "<td>4</td>";
								content += "<td><a class='btn btn-success btn-xs'>Active</a></td>";

								content += "</tr>";


							}
							$('#jobs_table tbody').prepend(content);
						}






					} else {
						toastr.warning('Message : Data Error Occured!')
					}
				}
			});



		}



	});



	// END SAVING THE JOB ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


}); // end of document ready 

$('#search_filter').on('click', function () {

	var filter_round = $('#filter_round').val();
	var filter_service = $('#filter_service').val();
	var filter_due_dates = $('#filter_due_dates').val();
	var filter_due_date_from = $('#filter_due_date_from').val();
	var filter_due_date_to = $('#filter_due_date_to').val();
	var filter_quote = $('#filter_quote').val();

	var headertext = [];
	var headers = document.querySelectorAll("thead");

	for (var i = 0; i < headers.length; i++) {
		headertext[i] = [];
		for (var j = 0, headrow; headrow = headers[i].rows[0].cells[j]; j++) {
			var current = headrow;
			headertext[i].push(current.textContent);
		}
	}

	$.ajax({
		url: "php_queries/filter.php",
		type: 'GET',
		data: {
			filter_round: filter_round,
			filter_service: filter_service,
			filter_due_dates: filter_due_dates,
			filter_due_date_from: filter_due_date_from,
			filter_due_date_to: filter_due_date_to,
			filter_quote: filter_quote,
			headertext: headertext,
		},
		dataType: 'json',
		success: function (response) {
			console.log('jobs', response);
			jobs = response;
			if (response != 1) {
				var len = response.length;
				content = "";
				var today = new Date();
				var n = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
				for (var i = 0; i < len; i++) {
					var jobs_sched_date = response[i]['jobs_sched_date'];
					var job_ref = response[i]['job_ref'];
					var cust_ref = response[i]['cust_ref'];
					var cust_address1 = response[i]['cust_address1'];
					var cust_address2 = response[i]['cust_address2'];
					var cust_town = response[i]['cust_town'];
					var cust_country = response[i]['cust_country'];
					var cust_postcode = response[i]['cust_postcode'];
					var cust_fname = response[i]['cust_fname'];
					var cust_lname = response[i]['cust_lname'];
					var cust_phone = response[i]['cust_phone'];
					var cust_mobile = response[i]['cust_mobile'];
					var cust_email = response[i]['cust_email'];
					var one_off = response[i]['d_w_m_option1'];
					var jobs_price1 = response[i]['jobs_price1'];
					var my_round = response[i]['my_round'];
					var job_id = response[i]['job_id'];
					var stats = response[i]['stats'];
					var checkbox_ref2 = response[i]['checkbox_ref2'];
					var checkbox_ref3 = response[i]['checkbox_ref3'];
					var checkbox_jobs_invoice = response[i]['checkbox_jobs_invoice'];
					var checkbox_ref1 = response[i]['checkbox_ref1'];
					var name = response[i]['name'];


					content += "<tr>";
					content += "<td><input type ='checkbox' class='checkboxjobs' name='checkboxjobs' ></td>";
					if (n > jobs_sched_date) {
						content += "<td><button onclick='editJob("+i+")' type='button'  class='btn btn-danger btn-xs job_modal' target-id='" + job_id + "'>" + jobs_sched_date + "</button></td>";
					} else {
						content += "<td><button onclick='editJob("+i+")' type='button'  class='btn btn-success btn-xs job_modal' target-id='" + job_id + "'>" + jobs_sched_date + "</button></td>";
					}
					content += "<td>Worksheet</td>";
					content += "<td>New</td>";
					if (checkbox_ref2 == 1) {
						content += "<td>1</td>";
					} else {
						content += "<td></td>";
					}

					if (checkbox_ref3 == 1) {
						content += "<td>1</td>";
					} else {
						content += "<td></td>";
					}

					if (checkbox_jobs_invoice == 1) {
						content += "<td>1</td>";
					} else {
						content += "<td></td>";
					}
					if (job_ref == 'no') {
					} else {
						content += "<td>" + job_ref + "</td>";
					}
					if (cust_ref == 'no') {
					} else {
						content += "<td>" + cust_ref + "</td>";
					}
					if (cust_address1 == 'no') {
					} else {
						content += "<td>" + cust_address1 + "</td>";
					}
					if (cust_address2 == 'no') {
					} else {
						content += "<td>" + cust_address2 + "</td>";
					}
					if (name == 'no') {
					} else {
						content += "<td>" + name + "</td>";
					}
					content += "<td></td>";
					if (cust_town == 'no') {
					} else {
						content += "<td>" + cust_town + "</td>";
					}
					if (cust_country == 'no') {
					} else {
						content += "<td>" + cust_country + "</td>";
					}
					if (cust_postcode == 'no') {
					} else {
						content += "<td>" + cust_postcode + "</td>";
					}
					if (cust_phone == 'no') {
					} else {
						content += "<td>" + cust_phone + "</td>";
					}
					if (cust_mobile == 'no') {
					} else {
						content += "<td>" + cust_mobile + "</td>";
					}
					if (cust_email == 'no') {
					} else {
						content += "<td>" + cust_email + "</td>";
					}
					if (one_off == 'no') {
					} else {
						content += "<td>" + one_off + "</td>";
					}
					if (jobs_price1 == 'no') {
					} else {
						content += "<td>" + jobs_price1 + "</td>";
					}
					if (my_round == 'no') {
					} else {
						content += "<td>" + my_round + "</td>";
					}
					if (stats == 'no') {
					} else {
						content += "<td><a class='btn btn-success btn-xs'>Active</a></td>";
					}

					content += "</tr> ";
				}


				header = "";
				header += "<tr>";
				header += "<th><input type='checkbox' class='selectAll' ></th>";
				header += "<th>Due</th>";
				header += "<th>Worksheet</th>";
				header += "<th>New</th>";
				header += "<th><i class='fa fa-fw fa-exclamation-circle' title='Important'></i></th>";
				header += "<th><i class='fa fa-fw fa-bell' title='Reminder'></i></th>";
				header += "<th><i class='fa fa-fw fa-folder' title='Requires Invoice'></i></th>";
				if (job_ref == 'no') {
				} else {
					header += "<th>Job Ref</th>";
				}
				if (cust_ref == 'no') {
				} else {
					header += "<th>Cust Ref</th>";
				}
				if (cust_address1 == 'no') {
				} else {
					header += "<th>Address 1</th>";
				}
				if (cust_address2 == 'no') {
				} else {
					header += "<th>Address 2</th>";
				}
				if (name == 'no') {
				} else {
					header += "<th>Name</th>";
				}
				header += "<th><i class='fa fa-fw fa-envelope'></i></th>";
				if (cust_town == 'no') {
				} else {
					header += "<th>Town</th>";
				}
				if (cust_country == 'no') {
				} else {
					header += "<th>Country</th>";
				}
				if (cust_postcode == 'no') {
				} else {
					header += "<th>Postcode</th>";
				}
				if (cust_phone == 'no') {
				} else {
					header += "<th>Phone</th>";
				}
				if (cust_mobile == 'no') {
				} else {
					header += "<th>Mobile</th>";
				}
				if (cust_email == 'no') {
				} else {
					header += "<th>Email</th>";
				}
				if (one_off == 'no') {
				} else {
					header += "<th>Schedule</th>";
				}
				if (jobs_price1 == 'no') {
				} else {
					header += "<th>Price</th>";
				}
				if (my_round == 'no') {
				} else {
					header += "<th>Round</th>";
				}
				if (stats == 'no') {
				} else {
					header += "<th>Status</th>";
				}
				header += "</tr> ";

				$('#jobs_table').dataTable().fnDestroy();
				$('#jobs_table thead').empty();
				$('#jobs_table tbody').empty();

				$('#jobs_table thead').append(header);
				$('#jobs_table tbody').append(content);
				$('#jobs_table').dataTable({
					"ordering": false, // true or false
					"pagingType": 'simple_numbers',// numbers - simple - simple_numbers - full - full_numbers - first_last_numbers
					"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
					"lengthChange": true,
					"displayLength": 10,
					"autoWidth": false,
					"searching": false,
					"responsive": true,
					"bLengthChange": true,
					"bInfo": true,
					"dom": 'Blfrtip',
					'columnDefs':
						[{
							'targets': [0], /* column index */
							'orderable': false, /* true or false */
						}]
				});


			} else {
				toastr.warning('Message : No Data Found!');

			}
		}
	});



});

$("#filter_due_dates").change(function () {
	var filter_due_dates = $(this).val();

	if (filter_due_dates == 'Custom') {
		document.getElementById("filter_due_date_from").readOnly = false;
		document.getElementById("filter_due_date_to").readOnly = false;

	} else {
		document.getElementById("filter_due_date_from").readOnly = true;
		document.getElementById("filter_due_date_to").readOnly = true;
		var filter_due_dates = $('#filter_due_date_from').val('');
		var filter_due_date_to = $('#filter_due_date_to').val('');

	}

});


$('#selectAll').click(function () {
	//check if checkbox is checked
	if ($(this).is(':checked')) {

		$('#add_worksheet').removeAttr('disabled'); //enable input

	} else {
		$('#add_worksheet').attr('disabled', true); //disable input
	}
});


function editJob(index) {
	console.log(jobs);
	console.log(index);
	const job = jobs[index];
	console.log(job);
	$('#edit_job_modal').modal('show');	
}
