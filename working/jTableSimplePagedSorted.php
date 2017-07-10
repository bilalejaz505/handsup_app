<html>
  <head>

    <link href="themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
	<link href="Scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
	
	<script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="Scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
	
  </head>
  <body>
	<div id="PeopleTableContainer" style="width: 600px;"></div>
	<script type="text/javascript">

		$(document).ready(function () {

		    //Prepare jTable
			$('#PeopleTableContainer').jtable({
				title: 'Table of people',
				paging: true,
				pageSize: 2,
				sorting: true,
				defaultSorting: 'Name ASC',
				//openChildAsAccordion: true,
				actions: {
					listAction: 'PersonActionsPagedSorted.php?action=list',
					createAction: 'PersonActionsPagedSorted.php?action=create',
					updateAction: 'PersonActionsPagedSorted.php?action=update',
					deleteAction: 'PersonActionsPagedSorted.php?action=delete'
				},
				fields: {
					PersonId: {
						key: true,
						create: false,
						edit: false,
						list: false
					},
					 //CHILD TABLE DEFINITION FOR "PHONE NUMBERS"
					Phones: {
						title: '',
						width: '5%',
						sorting: false,
						edit: false,
						create: false,
						display: function (personData) {
							//Create an image that will be used to open child table
							var $img = $('<img src="phone.png" title="Edit phone numbers" />');
							//Open child table when user clicks the image
							$img.click(function () {
											
								$('#PeopleTableContainer').jtable('openChildTable',
										$img.closest('tr'),
										{										
											title: personData.record.Name + ' - Phone numbers',
											actions: {
												listAction: 'PersonActionsPagedSorted2.php?action=list&PersonId=' + personData.record.PersonId,
												createAction: 'PersonActionsPagedSorted2.php?action=create',
												updateAction: 'PersonActionsPagedSorted2.php?action=update',
												deleteAction: 'PersonActionsPagedSorted2.php?action=delete'
											},
											fields: {
												PersonId: {
													type: 'hidden',
													defaultValue: personData.record.PersonId
												},
												PhoneId: {
													key: true,
													create: false,
													edit: false,
													list: false
												},
												 //CHILD TABLE DEFINITION FOR "ThirdLevel"
												Thirdlevel: {
													title: '',
													width: '5%',
													sorting: false,
													edit: false,
													create: false,
													display: function (phoneData) {
														//Create an image that will be used to open child table
														var $img = $('<img src="phone.png" title="Edit phone numbers" />');
														//Open child table when user clicks the image
														$img.click(function () {
																		
															$('#PeopleTableContainer').jtable('openChildTable',
																	$img.closest('tr'),
																	{										
																		title: 'Third Level Testing',
																		actions: {
																			listAction: 'PersonActionsPagedSorted3.php?action=list&PhoneId=' + phoneData.record.PhoneId,
																			createAction: 'PersonActionsPagedSorted3.php?action=create',
																			updateAction: 'PersonActionsPagedSorted3.php?action=update',
																			deleteAction: 'PersonActionsPagedSorted3.php?action=delete'
																		},
																		fields: {
																			PhoneId: {
																				type: 'hidden',
																				defaultValue: phoneData.record.PhoneId
																			},
																			ThirdId: {
																				key: true,
																				create: false,
																				edit: false,
																				list: false
																			},	
																			Third_Desc:{
																				title: 'Desc',
																				width: '30%',
																			},
																			Test: {
																				title: 'Test',
																				width: '30%',
																				create: false,
																				edit: false,
																				display: function (data) {
																				return '<b>test</b>';
																				}
																			}                                            
																		},
																		/*rowInserted: function (event, data) {
														                	data.row.find('.jtable-edit-command-button').hide(); 
																			data.row.find('.jtable-delete-command-button').hide();
																			$(".jtable-add-record").hide();
															            }*/
																	}, function (data) { //opened handler
																		data.childTable.jtable('load');
																	});
														});
														//Return image to show on the person row
														return $img;
													}
												},
												/*PhoneType: {
													title: 'Phone type',
													width: '30%',
													options: { '1': 'Home phone', '2': 'Office phone', '3': 'Cell phone' }
												},*/
												Custom: {
													title: 'Phone Number',
													width: '30%',
													create: false,
													edit: false,
													display: function (data) {
													return '<b><a href="javascript:void(0);" onclick="alert(\'ajax call here may be?\')">testing</a></b>';
													}
												}                                            
											},
											/*rowInserted: function (event, data) {
							                	data.row.find('.jtable-edit-command-button').hide(); 
												data.row.find('.jtable-delete-command-button').hide();
												$(".jtable-add-record").hide();
								            }*/
										}, function (data) { //opened handler
											data.childTable.jtable('load');
										});
							});
							//Return image to show on the person row
							return $img;
						}
					},
					Name: {
						title: 'Author Name',
						width: '40%'
					},
					Age: {
						title: 'Age',
						width: '20%'
					},
					RecordDate: {
						title: 'Record date',
						width: '30%',
						type: 'date',
						create: false,
						edit: false
					}
				}
			});

			//Load person list from server
			$('#PeopleTableContainer').jtable('load');

		});

	</script>
 
  </body>
</html>
