$(document).ready(function() {
    var csrftoken = $('meta[name="csrf-token"]').attr('content');
    var titlelocation = document.getElementById("titlelocation");
    var option = document.createElement("option");
    var button = document.createElement("button");
    var division = document.createElement("div");
    var paragraph = document.createElement("p");
    var anchor = document.createElement("a");

    if(GetCookie("reportmonth") != null)
    {
       var getelementreportmonth = GetCookie("reportmonth");
    }
   
    if(GetCookie("reportdate") != null)
    {
       var getelementreportdate = GetCookie("reportdate");
    }
   
    if (document.getElementById("agencycontent") != null) {
       $("#menuagency").addClass("active");
       if (titlelocation != null) {
           titlelocation.innerText = "Instansi"; 
       }
    } else {
       $("#menuagency").removeClass("active");
    }
   
    if (document.getElementById("monitoringcontent") != null) {
       $("#menuhome").addClass("active");
       if (titlelocation != null) {
           titlelocation.innerText = "Utama"; 
       }
    } else {
       $("#menuhome").removeClass("active");
    }
   
    if (document.getElementById("usercontent") != null) {
       $("#menuuser").addClass("active");
       if (titlelocation != null) {
           titlelocation.innerText = "Pengguna";
       }
    } else {
       $("#menuuser").removeClass("active");
    }
   
    if (document.getElementById("signaturecontent") != null) {
       $("#menusignature").addClass("active");
       if (titlelocation != null) {
           titlelocation.innerText = "Tanda Tangan";
       }
    } else {
       $("#menusignature").removeClass("active");
    }
    
    if (document.getElementById("reportcontent") != null) {
       GetOptionReport();
       $("#menureport").addClass("active");
       if (titlelocation != null) {
           titlelocation.innerText = "Laporan";
       }
    } else if (document.getElementById("reportopencontent") != null) {
       $("#menureport").addClass("active");
       if (titlelocation != null) {
           titlelocation.innerText = "Laporan Bulanan"; 
       }
    } else if (document.getElementById("reportopendetailcontent") != null) {
       $("#menureport").addClass("active");
       if (titlelocation != null) {
           titlelocation.innerText = "Laporan Mingguan";  
       }
    } else {
       $("#menureport").removeClass("active");
    }

    $('#titleopen').text('Laporan Bulanan '+FormatDate(4, getelementreportmonth));
    $('#titleopendetail').text('Laporan Mingguan Tanggal '+FormatDate(5, getelementreportdate)); 
   
    function Footer(data) {
        return 'DISKOMINFO © Copyright ' + data + '. All right reserved.';
    }

    function Number(number) {
        return String(number).split('.')[1];
    }

    function Option(value, text) {
       option.value = value;
       option.innerText = text;
       return option.outerHTML;
    }
   
    function Division(classname, dividerhtml) {
       division.innerHTML = dividerhtml;
       division.className = classname;
       return division.outerHTML;
    }

    function Action(item) {
        var data = Array();
        if (Array.isArray(item)) {
            data = item.join('\n');
        }
        return data;
    }

    function ErrorMessage(data) {
        if (Array.isArray(data)) {
            document.getElementById('error').innerText = data[0];
            document.getElementById('errormessage').style.visibility = 'visible';
        } else {
            location.reload();
        }
    }
   
    function GetCookie(value) {
       var data = null;
       var cookie = document.cookie.split(";");
       for(var i = 0; i < cookie.length; i++) {
           var check = cookie[i].split("=");
           if(value == check[0].trim()) {
               data = decodeURIComponent(check[1]);
           }
       }
       return data;
    }
   
    function Json(index, item) {
       var data = Array();
       if (Array.isArray(index) && Array.isArray(item)) {
           if (index.length > 0 && item.length > 0) {
               if (index.length === item.length) {
                   for (let a = 0; a < item.length; a++) {
                       data[index[a]] = item[a];
                   }
               }
           }
       }
       return JSON.stringify(Object.assign({}, data));
    }
   
    function ProgressCircle(id) {
        var circle = new ProgressBar.Circle(id, {
            strokeWidth: 10,
            easing: 'easeInOut',
            duration: 1400,
            color: '#28A745',
            trailColor: '#EFEFEF',
            trailWidth: 1,
            svgStyle: null
        });
        return circle;
    }

    function Button(id, classname, type, toggledata, targetdata, buttonhtml, buttondata) {
       button.id = id;
       button.type = type;
       button.className = classname;
       button.innerHTML = buttonhtml;
       button.setAttribute('data-button', buttondata);
       button.setAttribute('data-toggle', toggledata);
       button.setAttribute('data-target', targetdata);
       return button.outerHTML;
    }

    function Anchor(id, classname, toggledata, targetdata, href, anchorhtml, anchordata, target) {
       anchor.id = id;
       anchor.href = href;
       anchor.target = target;
       anchor.className = classname;
       anchor.innerHTML = anchorhtml;
       anchor.setAttribute('data-a', anchordata);
       anchor.setAttribute('data-toggle', toggledata);
       anchor.setAttribute('data-target', targetdata);
       return anchor.outerHTML;
    }

    function FormatDate(select, value) {
        var monthnames = [
            "Januari", "Februari", "Maret",
            "April", "Mei", "Juni", "Juli",
            "Agustus", "September", "Oktober",
            "November", "Desember"
        ];
    
        var data = String(value).split(' ');
        var splitmonth = data[0];
        var splityear = data[1];
        var months = (select == 1) ? splitmonth : value;
        var index = monthnames.indexOf(months);
        var number = index + 1;
        var digit = '0' + number;
        var digitmonth = (index < 9) ? digit : number;
        var dates = new Date(value);
        var year = dates.getFullYear();
        var month = dates.getMonth();
        var day = dates.getDate();
    
        switch (select) {
            case 1:
                var date = digitmonth;
                break;
    
            case 2:
                var date = monthnames[value - 1];
                break;
    
            case 3:
                var date = splityear + '-' + digitmonth;
                break;
    
            case 4:
                var date = monthnames[month] + ' ' + year;
                break;
    
            case 5:
                var date = day + ' ' + monthnames[month] + ' ' + year;
                break;
    
            default:
                break;
        }
    
        return date;
    }
         
    function FooterLabel() {
       $.getJSON('/pemantauansitusweb/pagefooter', function (data) {
           $('#footerlabel').text(Footer(data));
       });
    }

    function GetLoggedUsername() {
       $.getJSON('/pemantauansitusweb/setname', function (data) {
           $('#loggedusername').text(data);
       });
    }
   
    function GetOptionReport() {
        $.getJSON('/pemantauansitusweb/report/getoption', function (data) {
            if (data.length > 0) {
                for (let items = 0; items < data.length; items++) {
                    $("#reportdescription").append(Option(data[items][0], data[items][1]));
                }
            }
        });
    }

    function GetOptionMonitoring() {
       $.getJSON('/pemantauansitusweb/monitoring/getoption', function (data) {
           if ($("#divisionagenciesid").val() === null) {
               if (data.length > 0) {
                   for (let items = 0; items < data.length; items++) {
                       $("#divisionagenciesid").append(Option(data[items][0], data[items][1]));
                   } 
               }
           }
       });
    }
   
    /*================================
    Datepicker
    ==================================*/
  
    $('#reportbydatedateupdate').datepicker({
        title: 'Tanggal',
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        language: 'id',
        startView: 0
    });
  
    $('#dateimportupdate').datepicker({
        title: 'Tanggal Update',
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        language: 'id',
        setValue: '2020-05-08',
        startView: 0
    });
  
    $('#reportdateupdate').datepicker({
        title: 'Tanggal',
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        language: 'id',
        startView: 0
    });
  
    $('#checkdateupdate').datepicker({
        title: 'Tanggal Update',
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        language: 'id',
        startView: 0
    });
  
    $('#reportbyyear').datepicker({
        format: 'yyyy',
        language: 'id',
        viewMode: 'years',
        minViewMode: 'years',
        orientation: 'bottom'
    });
  
    $('#reportbymonth').datepicker({
        format: 'MM',
        language: 'id',
        viewMode: 'months',
        minViewMode: 'months',
        maxViewMode: 'months'
    });
  
  //   $('#monthandyear').datepicker({
  //       title: 'Bulan Update',
  //       format: 'MM yyyy',
  //       language: 'id',
  //       viewMode: 'months',
  //       minViewMode: 'months'
  //   });
  
    /*================================
    Filestyle
    ==================================*/
  
    $('#fileimport').filestyle({
        placeholder : 'Berkas belum dipilih!',
        btnClass : 'btn-outline-primary btn-flat',
        text : 'Pilih Berkas'
    });
  
    $.validator.addMethod("passwordcheck", function(value) {
      return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value)
          && /[a-z]/.test(value)
          && /\d/.test(value)
    });
  
    $.validator.addMethod("checknameregister", function(value) {
      var getvalidation = false;
  
      $.ajax({
          type: 'POST',
          url: "/pemantauansitusweb/getregisternamecheck",
          async: false,
          data: {
             '_token': csrftoken,
             'name': value
          },
          success: function(data) { 
              getvalidation = (data === true) ? true : false; 
          },
          error: function () {
              swal({
                title: "Oops...",
                text: "Terjadi kesalahan!",
                icon: "error",
                button: "Konfirmasi",
              });
          }
      });
  
      return getvalidation;
    });
  
    $.validator.addMethod("checkname", function(value) {
      var data = JSON.parse($("#buttonuser").attr('data-button'));
      var getvalidation = false;
  
      $.ajax({
          type: 'POST',
          url: "/pemantauansitusweb/getnamecheck",
          async: false,
          data: {
             '_token': csrftoken,
             'id': data.id,
             'name': value
          },
          success: function(data) { 
              getvalidation = (data === true) ? true : false;
          },
          error: function () {
              swal({
                title: "Oops...",
                text: "Terjadi kesalahan!",
                icon: "error",
                button: "Konfirmasi",
              });
          }
      });
  
      return getvalidation;
    });
  
    $.validator.addMethod("checksignaturenumber", function(value) {
      var data = JSON.parse($("#buttonsignature").attr('data-button'));
      var getvalidation = false;
  
      $.ajax({
          type: 'POST',
          url: "/pemantauansitusweb/getsignaturenumbercheck",
          async: false,
          data: {
             '_token': csrftoken,
             'id': data.id, 
             'number': value
          },
          success: function(data) { 
              getvalidation = (data === true) ? true : false; 
          },
          error: function () {
              swal({
                title: "Oops...",
                text: "Terjadi kesalahan!",
                icon: "error",
                button: "Konfirmasi",
              });
          }
      });
  
      return getvalidation;
    });
  
    $(document).ready(function () {
          ValidateUserForm();
          ValidateLoginForm();
          ValidateImportForm();
          ValidateAgencyForm();
          ValidateReportForm();
          ValidateRegisterForm();
          ValidateDivisionForm();
          ValidateSignatureForm();
          ValidateSubdivisionForm();
          ValidateReportByDateForm();
          ValidateCheckDateUpdateForm();
          ValidateReportByMonthAndYearForm();
    });
  
    var ValidateLoginForm = function () {
      var loginform = $('#loginform');
      loginform.validate({
          lang: 'id',
          rules: {
              name: {
                  required: true     
              },
              password: {
                  required: true      
              }
          },
          errorPlacement: function (error, element) {
              error.insertAfter(element);
  
              $(window).resize(function () {
                  error.remove();
              });
          },
          invalidHandler: function (event, validator) {
              var errors = validator.numberOfInvalids();
              if (errors) {
              } else {
              }
          }
      });
    }
  
    var ValidateRegisterForm = function () {
      var registerform = $('#registerform');
      registerform.validate({
          lang: 'id',
          rules: {
              name: {
                  checknameregister: true,
                  required: true,
                  maxlength: 12,     
                  minlength: 3
              },
              email: {
                  required: true,
                  email: true
              },
              password: {
                  required: true,
                  passwordcheck: true,
                  minlength: 8     
              },
              password_confirmation: {
                  required: true,
                  equalTo: "#password"    
              }
          },
          errorPlacement: function (error, element) {
              error.insertAfter(element);
  
              $(window).resize(function () {
                  error.remove();
              });
          },
          invalidHandler: function (event, validator) {
              var errors = validator.numberOfInvalids();
              if (errors) {
              } else {
              }
          }
      });
    }
  
    var ValidateAgencyForm = function () {
        var agencyform = $('#agencyform');
        agencyform.validate({
            lang: 'id',
            rules: {
                agencydescription: {
                    required: true     
                }
            },
            errorPlacement: function (error, element) {
               error.insertAfter(element);
  
                $(window).resize(function () {
                    error.remove();
                });
            },
            invalidHandler: function (event, validator) {
                var errors = validator.numberOfInvalids();
                if (errors) {
                } else {
                }
            }
        });
    }
  
    var ValidateCheckDateUpdateForm = function () {
      var checkdateupdateform = $('#checkdateupdateform');
      checkdateupdateform.validate({
          lang: 'id',
          rules: {
              checkdateupdate: {
                  required: true     
              }
          },
          errorPlacement: function (error, element) {
             error.insertAfter(element);
  
              $(window).resize(function () {
                  error.remove();
              });
          },
          invalidHandler: function (event, validator) {
              var errors = validator.numberOfInvalids();
              if (errors) {
              } else {
              }
          }
      });
    }
  
    var ValidateDivisionForm = function () {
      var divisionform = $('#divisionform');
      divisionform.validate({
          lang: 'id',
          rules: {
              divisionnumber: {
                  digits: true,
                  required: true     
              },
              divisiondescription: {
                  required: true     
              },
              divisionlinkwebsite: {
                  required: true,
                  url: true     
              },
              divisionagenciesid: {
                  required: true     
              }
          },
          errorPlacement: function (error, element) {
             error.insertAfter(element);
  
              $(window).resize(function () {
                  error.remove();
              });
          },
          invalidHandler: function (event, validator) {
              var errors = validator.numberOfInvalids();
              if (errors) {
              } else {
              }
          }
      });
    }
  
    var ValidateSubdivisionForm = function () {
      var subdivisionform = $('#subdivisionform');
      subdivisionform.validate({
          lang: 'id',
          rules: {
              subdivisionnumber: {
                  digits: true,
                  required: true     
              },
              subdivisiondescription: {
                  required: true     
              },
              subdivisionlinkwebsite: {
                  required: true,
                  url: true     
              }
          },
          errorPlacement: function (error, element) {
             error.insertAfter(element);
  
              $(window).resize(function () {
                  error.remove();
              });
          },
          invalidHandler: function (event, validator) {
              var errors = validator.numberOfInvalids();
              if (errors) {
              } else {
              }
          }
      });
    }
  
    var ValidateReportForm = function () {
      var reportform = $('#reportform');
      reportform.validate({
          lang: 'id',
          rules: {
              reportstatus: {
                  required: true     
              },
              reportdateupdate: {
                  required: true     
              },
              reportinformation: {
                  required: true     
              }
          },
          errorPlacement: function (error, element) {
             error.insertAfter(element);
  
              $(window).resize(function () {
                  error.remove();
              });
          },
          invalidHandler: function (event, validator) {
              var errors = validator.numberOfInvalids();
              if (errors) {
              } else {
              }
          }
      });
    }
  
    var ValidateReportByDateForm = function () {
      var reportbydateform = $('#reportbydateform');
      reportbydateform.validate({
          lang: 'id',
          rules: {
              reportbydatedateupdate: {
                  required: true     
              }
          },
          errorPlacement: function (error, element) {
             error.insertAfter(element);
  
              $(window).resize(function () {
                  error.remove();
              });
          },
          invalidHandler: function (event, validator) {
              var errors = validator.numberOfInvalids();
              if (errors) {
              } else {
              }
          }
      });
    }
  
    var ValidateReportByMonthAndYearForm = function () {
      var reportbymonthandyearform = $('#reportbymonthandyearform');
      reportbymonthandyearform.validate({
          lang: 'id',
          rules: {
              reportbymonth: {
                  required: true     
              },
              reportbyyear: {
                  required: true     
              }
          },
          errorPlacement: function (error, element) {
             error.insertAfter(element);
  
              $(window).resize(function () {
                  error.remove();
              });
          },
          invalidHandler: function (event, validator) {
              var errors = validator.numberOfInvalids();
              if (errors) {
              } else {
              }
          }
      });
    }
  
    var ValidateSignatureForm = function () {
      var signatureform = $('#signatureform');
      signatureform.validate({
          lang: 'id',
          rules: {
              signaturenumber: {
                  required: true,
                  digits: true,
                  checksignaturenumber: true
              },
              signatureemployeeidnumber: {
                  required: true     
              },
              signaturename: {
                  required: true     
              },
              signatureposition: {
                  required: true     
              }
          },
          errorPlacement: function (error, element) {
             error.insertAfter(element);
  
              $(window).resize(function () {
                  error.remove();
              });
          },
          invalidHandler: function (event, validator) {
              var errors = validator.numberOfInvalids();
              if (errors) {
              } else {
              }
          }
      });
    }
  
    var ValidateUserForm = function () {
      var userform = $('#userform');
      userform.validate({
          lang: 'id',
          rules: {
              useremail: {
                  required: true,
                  email: true      
              },
              username: {
                  checkname: true,
                  required: true,
                  maxlength: 12,     
                  minlength: 3
              },
              userpassword: {
                  required: true,
                  passwordcheck: true,
                  minlength: 8      
              }
          },
          errorPlacement: function (error, element) {
             error.insertAfter(element);
  
              $(window).resize(function () {
                  error.remove();
              });
          },
          invalidHandler: function (event, validator) {
              var errors = validator.numberOfInvalids();
              if (errors) {
              } else {
              }
          }
      });
    }
  
    var ValidateImportForm = function () {
      var importform = $('#importform');
      importform.validate({
          lang: 'id',
          rules: {
              dateimportupdate: {
                  required: true  
              },
              fileimport: {
                  required: true   
              }
          },
          errorPlacement: function (error, element) {
             error.insertAfter(element);
  
              $(window).resize(function () {
                  error.remove();
              });
          },
          invalidHandler: function (event, validator) {
              var errors = validator.numberOfInvalids();
              if (errors) {
              } else {
              }
          }
      });
    }

    $(document).on('click','#exportexcelbymonth', function() {
        var url = '/pemantauansitusweb/printmonitoringexcel00/'+getelementreportmonth;
        $.ajax({
            type: 'GET',
            url: url,
            success: function(){
                window.open(url, '_self');
                toastr.success('Ekspor Laporan Mingguan Berhasil', 'Success Message');
            },
            error: function () {
                swal({
                  title: "Oops...",
                  text: "Terjadi kesalahan!",
                  icon: "error",
                  button: "Konfirmasi",
                });
            }
        });
    });

    $(document).on('click','#wordreportbydate', function() {
        var url = '/pemantauansitusweb/printmonitoringword01/'+getelementreportdate;
        $.ajax({
            type: 'GET',
            url: url,
            success: function(){
                window.open(url, '_self');
                toastr.success('Ekspor Laporan Mingguan Berhasil', 'Success Message');
            },
            error: function () {
                swal({
                  title: "Oops...",
                  text: "Terjadi kesalahan!",
                  icon: "error",
                  button: "Konfirmasi",
                });
            }
        });
    });

    $(document).on('click','#pdfreportbydate', function() {  
        var url = '/pemantauansitusweb/printmonitoringpdf01/'+getelementreportdate;
        $.ajax({
            type: 'GET',
            url: url,
            success: function(){
                window.open(url, '_self');
                toastr.success('Ekspor Laporan Mingguan Berhasil', 'Success Message');
            },
            error: function () {
                swal({
                  title: "Oops...",
                  text: "Terjadi kesalahan!",
                  icon: "error",
                  button: "Konfirmasi",
                });
            }
        });
    });

    $(document).on('click','#excelreportbydate', function() {
        var url = '/pemantauansitusweb/printmonitoringexcel01/'+getelementreportdate;
        $.ajax({
            type: 'GET',
            url: url,
            success: function(){
                window.open(url, '_self');
                toastr.success('Ekspor Laporan Mingguan Berhasil', 'Success Message');
            },
            error: function () {
                swal({
                  title: "Oops...",
                  text: "Terjadi kesalahan!",
                  icon: "error",
                  button: "Konfirmasi",
                });
            }
        });
    });

    $(window).on('load', function() {
        $.getJSON('/pemantauansitusweb/loggedcheck', function (data) {
            if (data) { 
                document.getElementById('panelcontent').style.visibility = 'hidden';
                document.getElementById('logincontent').style.visibility = 'visible';
                $('#panelcontent').remove();
                $('#logincontent').add();
                if ($('#name').val().length > 0) {
                    $('#name').parent('.form-gp').addClass('focused');
                } else {
                    $('#name').parent('.form-gp').removeClass('focused');
                }
            } else {
                document.getElementById('logincontent').style.visibility = 'hidden';
                document.getElementById('panelcontent').style.visibility = 'visible';
                $("#reportdescription").val('pilih');
                GetLoggedUsername();
                FooterLabel();
            }
        });
    });
  
    $("#adddivision").mouseover(function() {
      $.ajax({
          type: 'GET',
          url: '/pemantauansitusweb/monitoring/buttoncheckdisabled',
        }).done(function(data){
        if (data == 'success') {
            $("#adddivision").prop('disabled', true);
        }else{
            $("#adddivision").prop('disabled', false);
        }
      });
    });
  
    $("#checkdateupdate").change(function() {
      var date = document.getElementById("checkdateupdate").value;
        $.ajax({
          type: 'GET',
          url: '/pemantauansitusweb/check/'+date,
        }).done(function(data){
        if (data == 'success') {
            $("#savedate").prop('disabled', true);
        }else{
            $("#savedate").prop('disabled', false);
        }
      });
    });

    $("#reportdescription").change(function() {
        var pdfurl = '/pemantauansitusweb/printmonitoringpdf02/'+this.value;
        var wordurl = '/pemantauansitusweb/printmonitoringword02/'+this.value;
        var excelurl = '/pemantauansitusweb/printmonitoringexcel02/'+this.value;
        if (String(this.value).toLowerCase() != 'pilih') {
            $(document).on('click','#pdfreport', function() {
                $.ajax({
                    type: 'GET',
                    url: pdfurl,
                    success: function(){
                        window.open(pdfurl);
                    },
                    error: function () {
                        swal({
                          title: "Oops...",
                          text: "Terjadi kesalahan!",
                          icon: "error",
                          button: "Konfirmasi",
                        });
                    }
                });
            });

            $(document).on('click','#wordreport', function() {
                $.ajax({
                    type: 'GET',
                    url: wordurl,
                    success: function(){
                        window.open(wordurl);
                    },
                    error: function () {
                        swal({
                          title: "Oops...",
                          text: "Terjadi kesalahan!",
                          icon: "error",
                          button: "Konfirmasi",
                        });
                    }
                });
            });

            $(document).on('click','#excelreport', function() {
                $.ajax({
                    type: 'GET',
                    url: excelurl,
                    success: function(){
                        window.open(excelurl);
                    },
                    error: function () {
                        swal({
                          title: "Oops...",
                          text: "Terjadi kesalahan!",
                          icon: "error",
                          button: "Konfirmasi",
                        });
                    }
                });
            });
        }
    });
  
    $("#checkdateupdateform").submit(function(event) {
       event.preventDefault();
       
       if ($("#checkdateupdateform").valid()){
          $("#savedate").prop('disabled', true); 
          $.ajax({
          type: 'POST',
          url: "/pemantauansitusweb/storedateupdate",
          data: {
              '_token': csrftoken,
              'checkdateupdate': $(this)[0][0].value
          },
              success: function(){
                  location.reload();
              },
              error: function () {
                  swal({
                    title: "Oops...",
                    text: "Terjadi kesalahan!",
                    icon: "error",
                    button: "Konfirmasi",
                  });
              }
          });
       }
    });
  
    $(document).on('click','#logout', function(event) {
      event.preventDefault();
  
      $.ajax({
            type: 'POST',
            url: "/pemantauansitusweb/logout",
            data: {
            '_token': csrftoken
            },
            success: function(){
                location.reload();
            },
            error: function () {
                swal({
                  title: "Oops...",
                  text: "Terjadi kesalahan!",
                  icon: "error",
                  button: "Konfirmasi",
                });
            }
      });
    });
  
    $("#loginform").submit(function(event) {
      event.preventDefault();
      
      if ($("#loginform").valid()){
          $.ajax({
          type: 'POST',
          url: "/pemantauansitusweb/masuk",
          data: {
              '_token': csrftoken,
              'name': $(this)[0][1].value,
              'password': $(this)[0][2].value
          },
              success: function(data){
                    ErrorMessage(data);
              },
              error: function () {
                  location.reload();
                  swal({
                    title: "Oops...",
                    text: "Terjadi kesalahan!",
                    icon: "error",
                    button: "Konfirmasi",
                  });
              }
          });
      }
    });
  
    $("#registerform").submit(function(event) {
      event.preventDefault();
      
      if ($("#registerform").valid()){
          $.ajax({
          type: 'POST',
          url: "/pemantauansitusweb/daftar",
          data: {
              '_token': csrftoken,
              'name': $(this)[0][0].value,
              'email': $(this)[0][1].value,
              'password': $(this)[0][2].value,
              'password_confirmation': $(this)[0][3].value
          },
              success: function(){
                  location.reload();
              },
              error: function () {
                  swal({
                    title: "Oops...",
                    text: "Terjadi kesalahan!",
                    icon: "error",
                    button: "Konfirmasi",
                  });
              }
          });
      }
    });

    $(document).on('click','#addagency', function() {
      $('#agencymodal').modal('show');
      $('.form-horizontal').show();
      $('.modal-title').text('Tambah Instansi');
      $("#agencyform")[0][0].value = null;
      $("#buttonagency").attr("data-button", '{"id":' + null + '}');
    });
  
    $("#agencyform").submit(function(event) {
       var data = JSON.parse($("#buttonagency").attr('data-button'));
       event.preventDefault();

       if ($("#agencyform").valid()){
        var circleagency = ProgressCircle('#loadagency');
          $("#loadagency").show();
          $("#buttonagency").prop('disabled', true); 
          $.ajax({
          type: 'POST',
          url: "/pemantauansitusweb/storeagency",
              data: {
                  '_token': csrftoken,
                  'agencyid': data.id,
                  'agencydescription': $(this)[0][0].value
              },
              success: function(){
                  $("#loadagency").hide();
                  $("#buttonagency").prop('disabled', false);
                  location.reload();
              },
              error: function () {
                  $("#loadagency").hide();
                  $("#buttonagency").prop('disabled', false);
                  swal({
                    title: "Oops...",
                    text: "Terjadi kesalahan!",
                    icon: "error",
                    button: "Konfirmasi",
                  });
              },
              xhr: function() {
                    var responselength = 0;
                    var xhr = $.ajaxSettings.xhr();
                    xhr.onprogress = function(event){
                        var values = event.currentTarget.responseText.substr(responselength); 
                        var data = JSON.parse(values);
                        responselength = event.currentTarget.responseText.length;
                        if (Array.isArray(data)) circleagency.animate(data[0]);
                    };
                    return xhr;
              }
          });
       }
    });

    $(document).on('click','#adddivision', function() {
      GetOptionMonitoring();
      $('#divisionmodal').modal('show');
      $('.form-horizontal').show();
      $('.modal-title').text('Tambah Pemantauan');
      $("#divisionform")[0][0].value = null;
      $("#divisionform")[0][1].value = null;
      $("#divisionform")[0][2].value = null;
      $("#divisionform")[0][3].value = 1;
      $("#buttondivision").attr("data-button", '{"id":' + null + ', "websites_id":' + null + '}');
    });
  
    $("#divisionform").submit(function(event) {
       var data = JSON.parse($("#buttondivision").attr('data-button'));
       event.preventDefault();

       if ($("#divisionform").valid()){
        var circledivision = ProgressCircle('#loaddivision');
          $("#loaddivision").show();
          $("#buttondivision").prop('disabled', true); 
          $.ajax({
          type: 'POST',
          url: "/pemantauansitusweb/storedivision",
          data: {
              '_token': csrftoken,
              'divisionid': data.id,
              'websitesiddivision': data.websites_id,
              'divisionnumber': $(this)[0][0].value,
              'divisiondescription': $(this)[0][1].value,
              'divisionlinkwebsite': $(this)[0][2].value,
              'divisionagenciesid': $(this)[0][3].value
          },
              success: function(){
                  $("#loaddivision").hide();
                  $("#buttondivision").prop('disabled', false); 
                  location.reload();
              },
              error: function () {
                  $("#loaddivision").hide();
                  $("#buttondivision").prop('disabled', false); 
                  swal({
                    title: "Oops...",
                    text: "Terjadi kesalahan!",
                    icon: "error",
                    button: "Konfirmasi",
                  });
              },
              xhr: function() {
                    var responselength = 0;
                    var xhr = $.ajaxSettings.xhr();
                    xhr.onprogress = function(event){
                        var values = event.currentTarget.responseText.substr(responselength); 
                        var data = JSON.parse(values);
                        responselength = event.currentTarget.responseText.length;
                        if (Array.isArray(data)) circledivision.animate(data[0]);
                    };
                    return xhr;
              }
          });
       }
    });

    $(document).on('click','#addsubdivision', function() {
      var data = JSON.parse($(this).attr('data-a'));
      $('#subdivisionmodal').modal('show');
      $('.form-horizontal').show();
      $('.modal-title').text('Tambah Sub Pemantauan');
      $("#subdivisionform")[0][0].value = null;
      $("#subdivisionform")[0][1].value = null;
      $("#subdivisionform")[0][2].value = null;
      $("#buttonsubdivision").attr("data-button", '{"divisions_id":' + data.id + ', "subdivisions_id":' + null + ', "websites_id":' + null + '}');
    });
  
    $("#subdivisionform").submit(function(event) {
       var data = JSON.parse($("#buttonsubdivision").attr('data-button'));
       event.preventDefault();
       
       if ($("#subdivisionform").valid()){
        var circlesubdivision = ProgressCircle('#loadsubdivision');
          $("#loadsubdivision").show();
          $("#buttonsubdivision").prop('disabled', true); 
          $.ajax({
          type: 'POST',
          url: "/pemantauansitusweb/storesubdivision",
          data: {
              '_token': csrftoken,
              'subdivisionid': data.divisions_id,
              'subdivisionsubid': data.subdivisions_id,
              'websitesidsubdivision': data.websites_id,
              'subdivisionnumber': $(this)[0][0].value,
              'subdivisiondescription': $(this)[0][1].value,
              'subdivisionlinkwebsite': $(this)[0][2].value
          },
              success: function(){
                  $("#loadsubdivision").hide();
                  $("#buttonsubdivision").prop('disabled', false); 
                  location.reload();
              },
              error: function () {
                  $("#loadsubdivision").hide();
                  $("#buttonsubdivision").prop('disabled', false); 
                  swal({
                    title: "Oops...",
                    text: "Terjadi kesalahan!",
                    icon: "error",
                    button: "Konfirmasi",
                  });
              },
              xhr: function() {
                    var responselength = 0;
                    var xhr = $.ajaxSettings.xhr();
                    xhr.onprogress = function(event){
                        var values = event.currentTarget.responseText.substr(responselength); 
                        var data = JSON.parse(values);
                        responselength = event.currentTarget.responseText.length;
                        if (Array.isArray(data)) circlesubdivision.animate(data[0]);
                    };
                    return xhr;
              }
          });
       }
    });

    $(document).on('click','#addreport', function() {
      var data = JSON.parse($(this).attr('data-a'));
      $('#reportmodal').modal('show');
      $('.form-horizontal').show();
      $('.modal-title').text('Cek Pembaruan');
      $("#reportform")[0][0].value = '=';
      $("#reportform")[0][1].value = null;
      $("#reportform")[0][2].value = null;
      $("#buttonreport").attr("data-button", '{"id":' + null + ', "websites_id":' + data.id + '}');
    });
  
    $("#reportform").submit(function(event) {
       var data = JSON.parse($("#buttonreport").attr('data-button'));
       event.preventDefault();

       if ($("#reportform").valid()){
        var circlereport = ProgressCircle('#loadreport');
          $("#loadreport").show();
          $("#buttonreport").prop('disabled', true); 
          $.ajax({
          type: 'POST',
          url: "/pemantauansitusweb/storereport",
          data: {
              '_token': csrftoken,
              'reportid': data.id,
              'reportwebsitesid': data.websites_id,
              'reportstatus': $(this)[0][0].value,
              'reportdateupdate': $(this)[0][1].value,
              'reportinformation': $(this)[0][2].value
          },
              success: function(){
                  $("#loadreport").hide();
                  $("#buttonreport").prop('disabled', false); 
                  location.reload();
              },
              error: function () {
                  $("#loadreport").hide();
                  $("#buttonreport").prop('disabled', false); 
                  swal({
                    title: "Oops...",
                    text: "Terjadi kesalahan!",
                    icon: "error",
                    button: "Konfirmasi",
                  });
              },
              xhr: function() {
                    var responselength = 0;
                    var xhr = $.ajaxSettings.xhr();
                    xhr.onprogress = function(event){
                        var values = event.currentTarget.responseText.substr(responselength); 
                        var data = JSON.parse(values);
                        responselength = event.currentTarget.responseText.length;
                        if (Array.isArray(data)) circlereport.animate(data[0]);
                    };
                    return xhr;
              }
          });
       }
    });

    $(document).on('click','#addsignature', function() {
      $('#signaturemodal').modal('show');
      $('.form-horizontal').show();
      $('.modal-title').text('Tambah Tanda Tangan');
      $("#signatureform")[0][0].value = null;
      $("#signatureform")[0][1].value = null;
      $("#signatureform")[0][2].value = null;
      $("#signatureform")[0][3].value = null;
      $("#buttonsignature").attr("data-button", '{"id":' + null + '}');
    });
  
    $("#signatureform").submit(function(event) {
       var data = JSON.parse($("#buttonsignature").attr('data-button'));
       event.preventDefault();
       
       if ($("#signatureform").valid()){
        var circlesignature = ProgressCircle('#loadsignature');
          $("#loadsignature").show();
          $("#buttonsignature").prop('disabled', true); 
          $.ajax({
          type: 'POST',
          url: "/pemantauansitusweb/storesignature",
          data: {
              '_token': csrftoken,
              'signatureid': data.id,
              'signaturename': $(this)[0][2].value,
              'signaturenumber': $(this)[0][0].value,
              'signatureposition': $(this)[0][3].value,
              'signatureemployeeidnumber': $(this)[0][1].value
          },
              success: function(){
                  $("#loadsignature").hide();
                  $("#buttonsignature").prop('disabled', false); 
                  location.reload();
              },
              error: function () {
                  $("#loadsignature").hide();
                  $("#buttonsignature").prop('disabled', false); 
                  swal({
                    title: "Oops...",
                    text: "Terjadi kesalahan!",
                    icon: "error",
                    button: "Konfirmasi",
                  });
              },
              xhr: function() {
                    var responselength = 0;
                    var xhr = $.ajaxSettings.xhr();
                    xhr.onprogress = function(event){
                        var values = event.currentTarget.responseText.substr(responselength); 
                        var data = JSON.parse(values);
                        responselength = event.currentTarget.responseText.length;
                        if (Array.isArray(data)) circlesignature.animate(data[0]);
                    };
                    return xhr;
              }
          });
       }
    });
  
    $(document).on('click','#menutype', function() {
      $('#menuhome').removeClass("active");
      $('#menuagency').removeClass("active");
      $('#menureport').removeClass("active");
      $('#menuimport').removeClass("active");
      $('#menuuser').removeClass("active");
      $('#menusignature').removeClass("active");
      if (titlelocation != null) {
          titlelocation.innerHTML = "Tipe Menu";  
      }
    });
  
    $(document).on('click','#import', function() {
      $('#importmodal').modal('show');
      $('.form-horizontal').show();
      $('.modal-title').text('Impor Data');
      $('#menuimport').addClass("active");
      $('#menuhome').removeClass("active");
      $('#menuagency').removeClass("active");
      $('#menureport').removeClass("active");
      $('#menutype').removeClass("active");
      $('#menuuser').removeClass("active");
      $('#menusignature').removeClass("active");
      if (titlelocation != null) {
          titlelocation.innerHTML = "Impor Data";
      }
    });
  
    $("#importform").submit(function(event) {
       event.preventDefault();
       var form = $(this)[0];
       var formdata = new FormData(form);
       formdata.append('_token', csrftoken);
       formdata.append('date', form[0].value);
       formdata.append('file', form[1].files[0]); 

       if ($("#importform").valid()){
        var circleimport = ProgressCircle('#loadimport');
          $('#loadimport').show();
          $("#buttonimport").prop('disabled', true);
          $.ajax({
            type:'POST',
            url: "/pemantauansitusweb/importexcel",
            data: formdata,
            cache: false,
            processData: false,
            contentType: false,
                success: function(){
                    $('#loadimport').hide();
                    $("#buttonimport").prop('disabled', false); 
                    location.reload();
                },
                error: function () {
                    $('#loadimport').hide();
                    $("#buttonimport").prop('disabled', false); 
                    swal({
                        title: "Oops...",
                        text: "Terjadi kesalahan!",
                        icon: "error",
                        button: "Konfirmasi",
                    });
                },
                xhr: function(){
                    var responselength = 0;
                    var xhr = $.ajaxSettings.xhr();
                    xhr.onprogress = function(event){
                        var values = event.currentTarget.responseText.substr(responselength); 
                        var data = JSON.parse(values);
                        responselength = event.currentTarget.responseText.length;
                        if (Array.isArray(data)) circleimport.animate(data[0]);
                    };
                    return xhr;
                }
          });
       }
    });
  
    $(document).on('click','#editdivision', function() {
      GetOptionMonitoring();
      var data = JSON.parse($(this).attr('data-a'));
      $('#divisionmodal').modal('show');
      $('.form-horizontal').show();
      $('.modal-title').text('Ubah Pemantauan');
      $("#divisionform")[0][0].value = data.number;
      $("#divisionform")[0][1].value = data.description;
      $("#divisionform")[0][2].value = data.linkwebsite;
      $("#divisionform")[0][3].value = data.agencies_id;
      $("#buttondivision").attr("data-button", '{"id":' + data.id + ', "websites_id":' + data.websites_id + '}');
    });
  
    $(document).on('click','#editsubdivision', function() {
      var data = JSON.parse($(this).attr('data-a'));
      $('#subdivisionmodal').modal('show');
      $('.form-horizontal').show();
      $('.modal-title').text('Ubah Sub Pemantauan');
      $("#subdivisionform")[0][0].value = Number(data.number);
      $("#subdivisionform")[0][1].value = data.description;
      $("#subdivisionform")[0][2].value = data.linkwebsite;
      $("#buttonsubdivision").attr("data-button", '{"divisions_id":' + data.id + ', "subdivisions_id":' + data.subid + ', "websites_id":' + data.websites_id + '}');
    });
  
    $(document).on('click','#editagency', function() {
      var data = JSON.parse($(this).attr('data-button'));
      $('#agencymodal').modal('show');
      $('.form-horizontal').show();
      $('.modal-title').text('Ubah Instansi');
      $("#agencyform")[0][0].value = data.description;
      $("#buttonagency").attr("data-button", '{"id":' + data.id + '}');
    });
  
    $(document).on('click','#editsignature', function() {
      var data = JSON.parse($(this).attr('data-button'));
      $('#signaturemodal').modal('show');
      $('.form-horizontal').show();
      $('.modal-title').text('Ubah Tanda Tangan');
      $("#signatureform")[0][2].value = data.name;
      $("#signatureform")[0][0].value = data.number;
      $("#signatureform")[0][3].value = data.position;
      $("#signatureform")[0][1].value = data.employeeidnumber;
      $("#buttonsignature").attr("data-button", '{"id":' + data.id + '}');
    });

    $(document).on('click','#editbymonthandyear', function() {
      var data = JSON.parse($(this).attr('data-button'));
      $('#reportbymonthandyearmodal').modal('show');
      $('.form-horizontal').show();
      $('.modal-title').text('Ubah Laporan Tahunan');
      $("#reportbyyear").val(data.year).datepicker('update');
      // $("#monthandyear").val(data.monthandyear).datepicker('update');
      $("#reportbymonth").val(FormatDate(2, data.month)).datepicker('update');
      $("#buttonreportbymonthandyear").attr("data-button", '{"monthandyear":' + '"' + data.reportbymonthandyear + '"' + '}');
    });
  
    $("#reportbymonthandyearform").submit(function(event) {
       var data = JSON.parse($("#buttonreportbymonthandyear").attr('data-button'));
       event.preventDefault();

       if ($("#reportbymonthandyearform").valid()) {
        var circleloadreportbymonthandyear = ProgressCircle('#loadreportbymonthandyear');
          $("#loadreportbymonthandyear").show();
          $("#buttonreportbymonthandyear").prop('disabled', true); 
          $.ajax({
          type: 'POST',
          url: "/pemantauansitusweb/storebymonthandyear",
          data: {
              '_token': csrftoken,
              'reportbymonthandyear': data.monthandyear,
              'reportbymonth': FormatDate(1, $(this)[0][0].value),
              'reportbyyear': $(this)[0][1].value
              // 'monthandyear': FormatDate(3, $(this)[0][0].value)
          },
              success: function(){
                  $("#loadreportbymonthandyear").hide();
                  $("#buttonreportbymonthandyear").prop('disabled', false); 
                  location.reload();
              },
              error: function () {
                  $("#loadreportbymonthandyear").hide();
                  $("#buttonreportbymonthandyear").prop('disabled', false); 
                  swal({
                    title: "Oops...",
                    text: "Terjadi kesalahan!",
                    icon: "error",
                    button: "Konfirmasi",
                  });
              },
              xhr: function(){
                  var responselength = 0;
                  var xhr = $.ajaxSettings.xhr();
                  xhr.onprogress = function(event){
                      var values = event.currentTarget.responseText.substr(responselength); 
                      var data = JSON.parse(values);
                      responselength = event.currentTarget.responseText.length;
                      if (Array.isArray(data)) circleloadreportbymonthandyear.animate(data[0]);
                  };
                  return xhr;
              }
          });
       }
    });

    $(document).on('click','#editreportbydate', function() {
      var data = JSON.parse($(this).attr('data-button'));
      $('#reportbydatemodal').modal('show');
      $('.form-horizontal').show();
      $('.modal-title').text('Ubah Laporan Bulanan');
      $("#reportbydatedateupdate").val(data.date).datepicker('update');
      $("#buttonreportbydate").attr("data-button", '{"date":' + '"' + data.id + '"' + '}');
    });
  
    $("#reportbydateform").submit(function(event) {
       var data = JSON.parse($("#buttonreportbydate").attr('data-button'));
       event.preventDefault();

       if ($("#reportbydateform").valid()) {
        var circlereportbydate = ProgressCircle('#loadreportbydate');
          $("#loadreportbydate").show();
          $("#buttonreportbydate").prop('disabled', true); 
          $.ajax({
          type: 'POST',
          url: "/pemantauansitusweb/storereportbydate",
          data: {
              '_token': csrftoken,
              'reportbydateupdate': data.date,
              'reportbydatedateupdate': $(this)[0][0].value
          },
              success: function(){
                  $("#loadreportbydate").hide();
                  $("#buttonreportbydate").prop('disabled', false);
                  location.reload();
              },
              error: function () {
                  $("#loadreportbydate").hide();
                  $("#buttonreportbydate").prop('disabled', false);
                  swal({
                    title: "Oops...",
                    text: "Terjadi kesalahan!",
                    icon: "error",
                    button: "Konfirmasi",
                  });
              },
              xhr: function(){
                  var responselength = 0;
                  var xhr = $.ajaxSettings.xhr();
                  xhr.onprogress = function(event){
                      var values = event.currentTarget.responseText.substr(responselength); 
                      var data = JSON.parse(values);
                      responselength = event.currentTarget.responseText.length;
                      if (Array.isArray(data)) circlereportbydate.animate(data[0]);
                  };
                  return xhr;
              }
          });
       }
    });
  
    $(document).on('click','#editreport', function() {
      var data = JSON.parse($(this).attr('data-button'));
      $('#reportmodal').modal('show');
      $('.form-horizontal').show();
      $('.modal-title').text('Ubah Laporan Mingguan');
      $("#reportform")[0][0].value = data.status;
      $("#reportform")[0][2].value = data.information;
      $("#reportdateupdate").val(data.dateupdate).datepicker('update');
      $("#buttonreport").attr("data-button", '{"id":' + data.id + ', "websites_id":' + data.website_id + '}');
    });
  
    $(document).on('click','#usersettings', function() {
      $('#usermodal').modal('show');
      $('.form-horizontal').show();
      $('.modal-title').text('Pengaturan Akun');

      $.ajax({
          type: 'GET',
          url: "/pemantauansitusweb/setuser",
          dataType: 'json',
          success: function (data){
              for (let i = 0; i < data.length; i++) {
                  $("#buttonuser").attr("data-button", '{"id":' + data[i][0] + '}');
                  $("#userform")[0][2].value = null;
                  $("#userform")[0][0].value = data[i][1];
                  $("#userform")[0][1].value = data[i][2];
              }
          },
          error: function () {
              swal({
                title: "Oops...",
                text: "Terjadi kesalahan!",
                icon: "error",
                button: "Konfirmasi",
              });
          }
      });
    });

    $(document).on('click','#edituser', function() {
      var data = JSON.parse($(this).attr('data-button'));
      $('#usermodal').modal('show');
      $('.form-horizontal').show();
      $('.modal-title').text('Ubah Pengguna');
      $("#userform")[0][2].value = null;
      $("#userform")[0][0].value = data.name;
      $("#userform")[0][1].value = data.email;
      $("#buttonuser").attr("data-button", '{"id":' + data.id + ', "name":' + '"' + data.name + '"' + '}');
    });
  
    $("#userform").submit(function(event) {
       var data = JSON.parse($("#buttonuser").attr('data-button'));
       event.preventDefault();

       if ($("#userform").valid()) {
        var circleuser = ProgressCircle('#loaduser');
          $("#loaduser").show();
          $("#buttonuser").prop('disabled', true); 
          $.ajax({
          type: 'POST',
          url: "/pemantauansitusweb/storeuser",
          data: {
              '_token': csrftoken,
              'userid': data.id,
              'username': $(this)[0][0].value,
              'useremail': $(this)[0][1].value,
              'userpassword': $(this)[0][2].value
          },
              success: function(){
                  $("#loaduser").hide();
                  $("#buttonuser").prop('disabled', false);
                  location.reload();
              },
              error: function () {
                  $("#loaduser").hide();
                  $("#buttonuser").prop('disabled', false);
                  swal({
                    title: "Oops...",
                    text: "Terjadi kesalahan!",
                    icon: "error",
                    button: "Konfirmasi",
                  });
              },
              xhr: function(){
                  var responselength = 0;
                  var xhr = $.ajaxSettings.xhr();
                  xhr.onprogress = function(event){
                      var values = event.currentTarget.responseText.substr(responselength); 
                      var data = JSON.parse(values);
                      responselength = event.currentTarget.responseText.length;
                      if (Array.isArray(data)) circleuser.animate(data[0]);
                  };
                  return xhr;
              }
          });
       }
    });
  
    $('body').on('click', '#buttondeleteuser', function(event) {
      event.preventDefault();
      var url = $(this).attr('href');
      paragraph.innerText = 'Klik hapus untuk menghapus data !';
      swal({
          title: "Apakah anda yakin ingin menghapus ini?",
          content: paragraph,
          dangerMode: true,
          icon: "warning",
          buttons: {
              cancel: "Batal",
              confirm: "Hapus"
          }
      }).then((isConfirm) => {
          if (isConfirm) {
            $.ajax({
              url:url,
              type:'POST',
              data: {
                  '_method': 'DELETE',
                  '_token': csrftoken
              },
              success: function() {
                  location.reload();
                  swal({
                      title: "Berhasil!",
                      text: "Data berhasil dihapus!",
                      icon: "success",
                      button: "Konfirmasi",
                  });
              },
              error: function () {
                  swal({
                      title: "Oops...",
                      text: "Terjadi kesalahan!",
                      icon: "error",
                      button: "Konfirmasi",
                  });
              }
          });
          } else {
            swal({
              title: "Hapus data dibatalkan!",
              button: "Konfirmasi",
          });
          }
        });
    });
  
    $('body').on('click', '#buttondeleteagency', function(event) {
      event.preventDefault();
      var url = $(this).attr('href');
      paragraph.innerText = 'Menghapus data instansi dapat menghapus data terkait seperti; pemantauan dan laporan!\n\nKlik hapus untuk menghapus data !';
          swal({
              title: "Apakah Anda yakin ingin menghapus ini?",
              content: paragraph,
              dangerMode: true,
              icon: "warning",
              buttons: {
                  cancel: "Batal",
                  confirm: "Hapus"
              }
          }).then((isConfirm) => {
              if (isConfirm) {
                $.ajax({
                  url:url,
                  type:'POST',
                  data: {
                      '_method': 'DELETE',
                      '_token': csrftoken
                  },
                  success: function() {
                      location.reload();
                      swal({
                          title: "Berhasil!",
                          text: "Data berhasil dihapus!",
                          icon: "success",
                          button: "Konfirmasi",
                      });
                  },
                  error: function () {
                      swal({
                          title: "Oops...",
                          text: "Terjadi kesalahan!",
                          icon: "error",
                          button: "Konfirmasi",
                      });
                  }
              });
              } else {
                swal({
                  title: "Hapus data dibatalkan!",
                  button: "Konfirmasi",
              });
              }
            });
    });
  
    $('body').on('click', '#buttondeletesignature', function(event) {
      event.preventDefault();
      var url = $(this).attr('href');
      paragraph.innerText = 'Klik hapus untuk menghapus data !';
          swal({
              title: "Apakah Anda yakin ingin menghapus ini?",
              content: paragraph,
              dangerMode: true,
              icon: "warning",
              buttons: {
                  cancel: "Batal",
                  confirm: "Hapus"
              }
          }).then((isConfirm) => {
              if (isConfirm) {
                $.ajax({
                  url:url,
                  type:'POST',
                  data: {
                      '_method': 'DELETE',
                      '_token': csrftoken
                  },
                  success: function() {
                      location.reload();
                      swal({
                          title: "Berhasil!",
                          text: "Data berhasil dihapus!",
                          icon: "success",
                          button: "Konfirmasi",
                      });
                  },
                  error: function () {
                      swal({
                          title: "Oops...",
                          text: "Terjadi kesalahan!",
                          icon: "error",
                          button: "Konfirmasi",
                      });
                  }
              });
              } else {
                swal({
                  title: "Hapus data dibatalkan!",
                  button: "Konfirmasi",
              });
              }
            });
    });
  
    $('body').on('click', '#moredeletedivision', function(event) {
      event.preventDefault();
      var url = $(this).attr('href');
      paragraph.innerText = 'Menghapus data pemantauan dapat menghapus data terkait seperti; sub dan laporan!\n\nKlik hapus untuk menghapus data !'; 
          swal({
              title: "Apakah Anda yakin ingin menghapus ini?",
              content: paragraph,
              dangerMode: true,
              icon: "warning",
              buttons: {
                  cancel: "Batal",
                  confirm: "Hapus"
              }
          }).then((isConfirm) => {
              if (isConfirm) {
                $.ajax({
                  url:url,
                  type:'POST',
                  data: {
                      '_method': 'DELETE',
                      '_token': csrftoken
                  },
                  success: function() {
                      location.reload();
                      swal({
                          title: "Berhasil!",
                          text: "Data berhasil dihapus!",
                          icon: "success",
                          button: "Konfirmasi",
                      });
                  },
                  error: function () {
                      swal({
                          title: "Oops...",
                          text: "Terjadi kesalahan!",
                          icon: "error",
                          button: "Konfirmasi",
                      });
                  }
              });
              } else {
                swal({
                  title: "Hapus data dibatalkan!",
                  button: "Konfirmasi",
              });
              }
            });
    });
  
    $('body').on('click', '#buttondeletebymonth', function(event) {
      event.preventDefault();
      var url = $(this).attr('href');
      paragraph.innerText = 'Menghapus data laporan dapat menghapus data terkait seperti; laporan bulanan dan laporan mingguan!\n\nKlik hapus untuk menghapus data !';
          swal({
              title: "Apakah Anda yakin ingin menghapus ini?",
              content: paragraph,
              dangerMode: true,
              icon: "warning",
              buttons: {
                  cancel: "Batal",
                  confirm: "Hapus"
              }
          }).then((isConfirm) => {
              if (isConfirm) {
                $.ajax({
                  url:url,
                  type:'POST',
                  data: {
                      '_method': 'DELETE',
                      '_token': csrftoken
                  },
                  success: function() {
                      location.reload();
                      swal({
                          title: "Berhasil!",
                          text: "Data berhasil dihapus!",
                          icon: "success",
                          button: "Konfirmasi",
                      });
                  },
                  error: function () {
                      swal({
                          title: "Oops...",
                          text: "Terjadi kesalahan!",
                          icon: "error",
                          button: "Konfirmasi",
                      });
                  }
              });
              } else {
                swal({
                  title: "Hapus data dibatalkan!",
                  button: "Konfirmasi",
              });
              }
            });
    });
  
    $('body').on('click', '#buttondeletebydate', function(event) {
      event.preventDefault();
      var url = $(this).attr('href');
      paragraph.innerText = 'Menghapus data laporan bulanan dapat menghapus data pada laporan mingguan!\n\nKlik hapus untuk menghapus data !';    
          swal({
              title: "Apakah Anda yakin ingin menghapus ini?",
              content: paragraph,
              dangerMode: true,
              icon: "warning",
              buttons: {
                  cancel: "Batal",
                  confirm: "Hapus"
              }
          }).then((isConfirm) => {
              if (isConfirm) {
                $.ajax({
                  url:url,
                  type:'POST',
                  data: {
                      '_method': 'DELETE',
                      '_token': csrftoken
                  },
                  success: function() {
                      location.reload();
                      swal({
                          title: "Berhasil!",
                          text: "Data berhasil dihapus!",
                          icon: "success",
                          button: "Konfirmasi",
                      });
                  },
                  error: function () {
                      swal({
                          title: "Oops...",
                          text: "Terjadi kesalahan!",
                          icon: "error",
                          button: "Konfirmasi",
                      });
                  }
              });
              } else {
                swal({
                  title: "Hapus data dibatalkan!",
                  button: "Konfirmasi",
              });
              }
            });
    });
  
    $('body').on('click', '#buttondeletebydatedetails', function(event) {
      event.preventDefault();
      var url = $(this).attr('href');
      paragraph.innerText = 'Klik hapus untuk menghapus data !';    
          swal({
              title: "Apakah Anda yakin ingin menghapus ini?",
              content: paragraph,
              dangerMode: true,
              icon: "warning",
              buttons: {
                  cancel: "Batal",
                  confirm: "Hapus"
              }
          }).then((isConfirm) => {
              if (isConfirm) {
                $.ajax({
                  url:url,
                  type:'POST',
                  data: {
                      '_method': 'DELETE',
                      '_token': csrftoken
                  },
                  success: function() {
                      location.reload();
                      swal({
                          title: "Berhasil!",
                          text: "Data berhasil dihapus!",
                          icon: "success",
                          button: "Konfirmasi",
                      });
                  },
                  error: function () {
                      swal({
                          title: "Oops...",
                          text: "Terjadi kesalahan!",
                          icon: "error",
                          button: "Konfirmasi",
                      });
                  }
              });
              } else {
                swal({
                  title: "Hapus data dibatalkan!",
                  button: "Konfirmasi",
              });
              }
            });
    });
  
    $('body').on('click', '#moredeletesubdivision', function(event) {
      event.preventDefault();
      var url = $(this).attr('href');
      paragraph.innerText = 'Menghapus data sub dapat menghapus data pada laporan!\n\nKlik hapus untuk menghapus data !';  
          swal({
              title: "Apakah Anda yakin ingin menghapus ini?",
              content: paragraph,
              dangerMode: true,
              icon: "warning",
              buttons: {
                  cancel: "Batal",
                  confirm: "Hapus"
              }
          }).then((isConfirm) => {
              if (isConfirm) {
                $.ajax({
                  url:url,
                  type:'POST',
                  data: {
                      '_method': 'DELETE',
                      '_token': csrftoken
                  },
                  success: function() {
                      location.reload();
                      swal({
                          title: "Berhasil!",
                          text: "Data berhasil dihapus!",
                          icon: "success",
                          button: "Konfirmasi",
                      });
                  },
                  error: function () {
                      swal({
                          title: "Oops...",
                          text: "Terjadi kesalahan!",
                          icon: "error",
                          button: "Konfirmasi",
                      });
                  }
              });
              } else {
                swal({
                  title: "Hapus data dibatalkan!",
                  button: "Konfirmasi",
              });
              }
            });
    });
  
    $('#usertable').DataTable({
          "paging" : true,
          "scrollx" : true,
          "autoWidth" : false,
          "responsive": true,
          "processing" : true,
          "scrollCollapse" : true,
          "rowReorder": {
          "selector": "td:nth-child(2)"
          },
          "language": {
                  "decimal":        "",
                  "emptyTable":     "Tidak ada data tersedia",
                  "info":           "Tampil _START_ sampai _END_ dari _TOTAL_ data",
                  "infoEmpty":      "Tidak ada data",
                  "infoFiltered":   "Tersaring dari _MAX_ total entri",
                  "infoPostFix":    "",
                  "thousands":      ",",
                  "lengthMenu":     "Tampil _MENU_ data",
                  "loadingRecords": "Tunggu...",
                  "processing":     "Proses...",
                  "search":         "Cari:",
                  "zeroRecords":    "Tidak ada data yang cocok",
                  "paginate": {
                      "first":      "Pertama",
                      "last":       "Terakhir",
                      "next":       "Selanjutnya",
                      "previous":   "Sebelumnya"
                  },
                  "aria": {
                      "sortAscending":  ": activate to sort column ascending",
                      "sortDescending": ": activate to sort column descending"
                  }
          },
          "ajax" : {
              "type" : "GET",
              "url" : "/pemantauansitusweb/user/index"
          },
          "columns" : [
              { "title": "No", "data": 0, "width": "5%", "targets": [0] },
              { "title": "Nama", "data": 2, "width": "45%", "targets": [1] },
              { "title": "Surel", "data": 3, "width": "35%", "targets": [2] },
              { "title": "Aksi", "data": null, "mRender": function(data, type, full) {
                  return Division('btn-action',
                    Action([
                        Button('edituser', 'btn btn-custom btn-warning edit', 'button', 'modal', '#usermodal', 'Ubah', Json(['id', 'name', 'email', 'password'], [full[1], full[2], full[3], full[4]])),
                        Anchor('buttondeleteuser', 'btn btn-custom btn-danger delete', '', '', '/pemantauansitusweb/user/destroy/' + full[1], 'Hapus', Json([],[]), '')
                    ])
                  );
              }, "width": "15%", "targets": [3] }
          ]
    });
  
    $('#signaturetable').DataTable({
          "paging" : true,
          "scrollx" : true,
          "autoWidth" : false,
          "responsive": true,
          "processing" : true,
          "scrollCollapse" : true,
          "rowReorder": {
          "selector": "td:nth-child(2)"
          },
          "language": {
                  "decimal":        "",
                  "emptyTable":     "Tidak ada data tersedia",
                  "info":           "Tampil _START_ sampai _END_ dari _TOTAL_ data",
                  "infoEmpty":      "Tidak ada data",
                  "infoFiltered":   "Tersaring dari _MAX_ total entri",
                  "infoPostFix":    "",
                  "thousands":      ",",
                  "lengthMenu":     "Tampil _MENU_ data",
                  "loadingRecords": "Tunggu...",
                  "processing":     "Proses...",
                  "search":         "Cari:",
                  "zeroRecords":    "Tidak ada data yang cocok",
                  "paginate": {
                      "first":      "Pertama",
                      "last":       "Terakhir",
                      "next":       "Selanjutnya",
                      "previous":   "Sebelumnya"
                  },
                  "aria": {
                      "sortAscending":  ": activate to sort column ascending",
                      "sortDescending": ": activate to sort column descending"
                  }
          },
          "ajax" : {
              "type" : "GET",
              "url" : "/pemantauansitusweb/signature/index"
          },
          "columns" : [
              { "title": "No", "data": 1, "width": "5%", "targets": [0] },
              { "title": "NIP", "data": 2, "width": "25%", "targets": [1] },
              { "title": "Nama", "data": 3, "width": "30%", "targets": [2] },
              { "title": "Jabatan", "data": 4, "width": "25%", "targets": [3] },
              { "title": "Aksi", "data": null, "mRender": function(data, type, full) {
                  return Division('btn-action',
                    Action([
                        Button('editsignature', 'btn btn-custom btn-warning edit', 'button', 'modal', '#signaturemodal', 'Ubah', Json(['id', 'number', 'employeeidnumber', 'name', 'position'], [full[0], full[1], full[2], full[3], full[4]])),
                        Anchor('buttondeletesignature', 'btn btn-custom btn-danger delete', '', '', '/pemantauansitusweb/signature/destroy/' + full[0], 'Hapus', Json([],[]), '')
                    ])
                  );
              }, "width": "15%", "targets": [4] }
          ]
    });
  
    $('#agencytable').DataTable({
          "paging" : true,
          "scrollx" : true,
          "autoWidth" : false,
          "responsive": true,
          "processing" : true,
          "scrollCollapse" : true,
          "rowReorder": {
          "selector": "td:nth-child(2)"
          },
          "language": {
                  "decimal":        "",
                  "emptyTable":     "Tidak ada data tersedia",
                  "info":           "Tampil _START_ sampai _END_ dari _TOTAL_ data",
                  "infoEmpty":      "Tidak ada data",
                  "infoFiltered":   "Tersaring dari _MAX_ total entri",
                  "infoPostFix":    "",
                  "thousands":      ",",
                  "lengthMenu":     "Tampil _MENU_ data",
                  "loadingRecords": "Tunggu...",
                  "processing":     "Proses...",
                  "search":         "Cari:",
                  "zeroRecords":    "Tidak ada data yang cocok",
                  "paginate": {
                      "first":      "Pertama",
                      "last":       "Terakhir",
                      "next":       "Selanjutnya",
                      "previous":   "Sebelumnya"
                  },
                  "aria": {
                      "sortAscending":  ": activate to sort column ascending",
                      "sortDescending": ": activate to sort column descending"
                  }
          },
          "ajax" : {
              "type" : "GET",
              "url" : "/pemantauansitusweb/agency/index"
          },
          "columns" : [
              { "title": "No", "data": 0, "width": "5%", "targets": [0] },
              { "title": "Deskripsi", "data": 2, "width": "80%", "targets": [1] },
              { "title": "Aksi", "data": null, "mRender": function(data, type, full) {
                  return Division('btn-action',
                    Action([
                        Button('editagency', 'btn btn-custom btn-warning edit', 'button', 'modal', '#agencymodal', 'Ubah', Json(['id', 'description'], [full[1], full[2]])),
                        Anchor('buttondeleteagency', 'btn btn-custom btn-danger delete', '', '', '/pemantauansitusweb/agency/destroy/' + full[1], 'Hapus', Json([],[]), '')
                    ])
                  );
              }, "width": "15%", "targets": [2] }
          ]
    });
  
    $('#monitoringtable').DataTable({
          "paging" : true,
          "scrollx" : true,
          "ordering": true,
          "autoWidth" : false,
          "responsive": true,
          "processing" : true,
          "scrollCollapse" : true,
          "rowReorder": {
          "selector": "td:nth-child(2)"
          },
          "language": {
                  "decimal":        "",
                  "emptyTable":     "Tidak ada data tersedia",
                  "info":           "Tampil _START_ sampai _END_ dari _TOTAL_ data",
                  "infoEmpty":      "Tidak ada data",
                  "infoFiltered":   "Tersaring dari _MAX_ total entri",
                  "infoPostFix":    "",
                  "thousands":      ",",
                  "lengthMenu":     "Tampil _MENU_ data",
                  "loadingRecords": "Tunggu...",
                  "processing":     "Proses...",
                  "search":         "Cari:",
                  "zeroRecords":    "Tidak ada data yang cocok",
                  "paginate": {
                      "first":      "Pertama",
                      "last":       "Terakhir",
                      "next":       "Selanjutnya",
                      "previous":   "Sebelumnya"
                  },
                  "aria": {
                      "sortAscending":  ": activate to sort column ascending",
                      "sortDescending": ": activate to sort column descending"
                  }
          },
          "ajax" : {
              "type" : "GET",
              "url" : "/pemantauansitusweb/monitoring/index"
          },
          "columns" : [
              { "title": "No", "data": 5, "width": "5%", "targets": [0] },
              { "title": "Uraian", "data": 6, "width": "20%", "targets": [1] },
              { "title": "Alamat Situs Web", "data": 1, "width": "12%", "targets": [2] },
              { "title": "Status", "data": 7, "width": "12%", "targets": [3] },
              { "title": "Tanggal", "data": 11, "width": "12%", "targets": [4] },
              { "title": "Keterangan", "data": 8, "width": "12%", "targets": [5] },
              { "title": "Instansi", "data": 10, "width": "12%", "targets": [6] },
              { "title": "Aksi", "data": null, "mRender": function(data, type, full) {
                  return (full[2] === null)? 
                      Division('btn-action',
                        Action([
                            Anchor('linkreportbydatedetails', 'btn btn-custom btn-primary link', '', '', full[1], 'Tautan', Json([], []), '_blank'),
                            Button('dropdownreportbydatedetails', 'btn btn-custom btn-secondary dropdown-toggle', 'button', 'dropdown', '', 'Lainnya', Json([], [])),
                            Division('dropdown-menu form-flat',
                                Action([
                                    Anchor('addsubdivision', 'dropdown-item', 'modal', '#subdivisionmodal', '#', 'Tambah Sub', Json(['id'],[full[4]]), ''),
                                    Anchor('moredeletedivision', 'dropdown-item', '', '', '/pemantauansitusweb/destroydivision/' + full[0], 'Hapus', Json([],[]), ''),
                                    Anchor('editdivision', 'dropdown-item', 'modal', '#divisionmodal', '#', 'Ubah', Json(['websites_id', 'linkwebsite', 'id', 'number', 'description', 'agencies_id'],[full[0], full[1], full[4], full[4], full[6], full[9]]), null), Division('dropdown-divider', null),
                                    Anchor('addreport', 'dropdown-item', 'modal', '#reportmodal', '#', 'Cek Pembaruan', Json(['id'],[full[0]]), '')                        
                                ])
                            )
                        ])
                      ):
  
                      Division('btn-action',
                        Action([
                            Anchor('linkreportsubbydatedetails', 'btn btn-custom btn-primary link', '', '', full[1], 'Tautan', Json([], []), '_blank'),
                            Button('dropdownreportsubbydatedetails', 'btn btn-custom btn-secondary dropdown-toggle', 'button', 'dropdown', '', 'Lainnya', Json([], [])),
                            Division('dropdown-menu form-flat',
                                Action([
                                    Anchor('moredeletesubdivision', 'dropdown-item', '', '', '/pemantauansitusweb/destroysubdivision/' + full[0], 'Hapus', Json([],[]), ''),
                                    Anchor('editsubdivision', 'dropdown-item', 'modal', '#subdivisionmodal', '#', 'Ubah', Json(['websites_id', 'linkwebsite', 'id', 'subid', 'number', 'description'],[full[0], full[1], full[3], full[4], full[5], full[6]]), null), Division('dropdown-divider', null),
                                    Anchor('addreport', 'dropdown-item', 'modal', '#reportmodal', '#', 'Cek Pembaruan', Json(['id'],[full[0]]), '')                        
                                ])
                            )
                        ])
                      );
              }, "width": "15%", "targets": [7] }
          ]
    });
  
    $('#reporttable').DataTable({
          "paging" : true,
          "scrollx" : true,
          "autoWidth" : false,
          "responsive": true,
          "processing" : true,
          "scrollCollapse" : true,
          "rowReorder": {
          "selector": "td:nth-child(2)"
          },
          "language": {
                  "decimal":        "",
                  "emptyTable":     "Tidak ada data tersedia",
                  "info":           "Tampil _START_ sampai _END_ dari _TOTAL_ data",
                  "infoEmpty":      "Tidak ada data",
                  "infoFiltered":   "Tersaring dari _MAX_ total entri",
                  "infoPostFix":    "",
                  "thousands":      ",",
                  "lengthMenu":     "Tampil _MENU_ data",
                  "loadingRecords": "Tunggu...",
                  "processing":     "Proses...",
                  "search":         "Cari:",
                  "zeroRecords":    "Tidak ada data yang cocok",
                  "paginate": {
                      "first":      "Pertama",
                      "last":       "Terakhir",
                      "next":       "Selanjutnya",
                      "previous":   "Sebelumnya"
                  },
                  "aria": {
                      "sortAscending":  ": activate to sort column ascending",
                      "sortDescending": ": activate to sort column descending"
                  }
          },
          "ajax" : {
              "type" : "GET",
              "url" : "/pemantauansitusweb/report/index"
          },
          "columns" : [
              { "title": "No", "data": 1, "width": "5%", "targets": [0] },
              { "title": "Bulan Pembaruan", "data": 5, "width": "40%", "targets": [1] },
              { "title": "Keterangan", "data": 6, "width": "40%", "targets": [2] },
              { "title": "Aksi", "data": null, "mRender": function(data, type, full) {
                  return Division('btn-action',
                    Action([
                        Anchor('btnopenreport', 'btn btn-custom btn-primary open', '', '', (full[0] === 1) ? '/pemantauansitusweb/laporan/bulanan/' + full[2] + '-' + full[4] : '/pemantauansitusweb/horisontal/laporan/bulanan/' + full[2] + '-' + full[4], 'Buka', Json(['month'], [full[2] + '-' + full[4]]), ''),
                        Button('editbymonthandyear', 'btn btn-custom btn-warning edit', 'button', 'modal', '#reportbymonthandyearmodal', 'Ubah', Json(['year', 'month','monthandyear','reportbymonthandyear'], [full[2], full[3], full[5], full[2] + '-' + full[4]])),
                        Anchor('buttondeletebymonth', 'btn btn-custom btn-danger delete', '', '', '/pemantauansitusweb/destroybymonthandyear/' + full[2] + '-' + full[4], 'Hapus', Json([],[]), '')
                    ])
                  );
              }, "width": "15%", "targets": [3] }
          ]
    });
  
    $('#horizontalreporttable').DataTable({
          "paging" : true,
          "scrollx" : true,
          "autoWidth" : false,
          "responsive": true,
          "processing" : true,
          "scrollCollapse" : true,
          "rowReorder": {
          "selector": "td:nth-child(2)"
          },
          "language": {
                  "decimal":        "",
                  "emptyTable":     "Tidak ada data tersedia",
                  "info":           "Tampil _START_ sampai _END_ dari _TOTAL_ data",
                  "infoEmpty":      "Tidak ada data",
                  "infoFiltered":   "Tersaring dari _MAX_ total entri",
                  "infoPostFix":    "",
                  "thousands":      ",",
                  "lengthMenu":     "Tampil _MENU_ data",
                  "loadingRecords": "Tunggu...",
                  "processing":     "Proses...",
                  "search":         "Cari:",
                  "zeroRecords":    "Tidak ada data yang cocok",
                  "paginate": {
                      "first":      "Pertama",
                      "last":       "Terakhir",
                      "next":       "Selanjutnya",
                      "previous":   "Sebelumnya"
                  },
                  "aria": {
                      "sortAscending":  ": activate to sort column ascending",
                      "sortDescending": ": activate to sort column descending"
                  }
          },
          "ajax" : {
              "type" : "GET",
              "url" : "/pemantauansitusweb/horizontal/report/index"
          },
          "columns" : [
              { "title": "No", "data": 1, "width": "5%", "targets": [0] },
              { "title": "Bulan Pembaruan", "data": 5, "width": "40%", "targets": [1] },
              { "title": "Keterangan", "data": 6, "width": "40%", "targets": [2] },
              { "title": "Aksi", "data": null, "mRender": function(data, type, full) {
                  return Division('btn-action',
                    Action([
                        Anchor('btnopenreport', 'btn btn-custom btn-primary open', '', '', (full[0] === 2) ? '/pemantauansitusweb/horisontal/laporan/bulanan/' + full[2] + '-' + full[4] : '/pemantauansitusweb/laporan/bulanan/' + full[2] + '-' + full[4], 'Buka', Json(['month'], [full[2] + '-' + full[4]]), ''),
                        Button('editbymonthandyear', 'btn btn-custom btn-warning edit', 'button', 'modal', '#reportbymonthandyearmodal', 'Ubah', Json(['year', 'month','monthandyear','reportbymonthandyear'], [full[2], full[3], full[5], full[2] + '-' + full[4]])),
                        Anchor('buttondeletebymonth', 'btn btn-custom btn-danger delete', '', '', '/pemantauansitusweb/destroybymonthandyear/' + full[2] + '-' + full[4], 'Hapus', Json([],[]), '')
                    ])
                  );
              }, "width": "15%", "targets": [3] }
          ]
    });
  
    $('#reportopentable').DataTable({
          "paging" : true,
          "scrollx" : true,
          "autoWidth" : false,
          "responsive": true,
          "processing" : true,
          "scrollCollapse" : true,
          "rowReorder": {
          "selector": "td:nth-child(2)"
          },
          "language": {
                  "decimal":        "",
                  "emptyTable":     "Tidak ada data tersedia",
                  "info":           "Tampil _START_ sampai _END_ dari _TOTAL_ data",
                  "infoEmpty":      "Tidak ada data",
                  "infoFiltered":   "Tersaring dari _MAX_ total entri",
                  "infoPostFix":    "",
                  "thousands":      ",",
                  "lengthMenu":     "Tampil _MENU_ data",
                  "loadingRecords": "Tunggu...",
                  "processing":     "Proses...",
                  "search":         "Cari:",
                  "zeroRecords":    "Tidak ada data yang cocok",
                  "paginate": {
                      "first":      "Pertama",
                      "last":       "Terakhir",
                      "next":       "Selanjutnya",
                      "previous":   "Sebelumnya"
                  },
                  "aria": {
                      "sortAscending":  ": activate to sort column ascending",
                      "sortDescending": ": activate to sort column descending"
                  }
          },
          "ajax" : {
              "type" : "GET",
              "url" : "/pemantauansitusweb/reportopen/"+getelementreportmonth
          },
          "columns" : [
              { "title": "No", "data": 1, "width": "5%", "targets": [0] },
              { "title": "Bulan Pembaruan", "data": 3, "width": "40%", "targets": [1] },
              { "title": "Keterangan", "data": 4, "width": "40%", "targets": [2] },
              { "title": "Aksi", "data": null, "mRender": function(data, type, full) {
                  return Division('btn-action',
                    Action([
                        Anchor('btndetailopenreport', 'btn btn-custom btn-primary open', '', '', (full[0] === 1) ? '/pemantauansitusweb/laporan/mingguan/' + full[2] : '/pemantauansitusweb/horisontal/laporan/mingguan/' + full[2], 'Buka', Json(['date'], [full[2]]), ''),
                        Button('editreportbydate', 'btn btn-custom btn-warning edit', 'button', 'modal', '#reportbydatemodal', 'Ubah', Json(['id', 'date'], [full[2], full[2]])),
                        Anchor('buttondeletebydate', 'btn btn-custom btn-danger delete', '', '', '/pemantauansitusweb/destroybydate/' + full[2], 'Hapus', Json([],[]), '')
                    ])
                  );
              }, "width": "15%", "targets": [3] }
          ]
    });
  
    $('#horizontalreportopentable').DataTable({
          "paging" : true,
          "scrollx" : true,
          "autoWidth" : false,
          "responsive": true,
          "processing" : true,
          "scrollCollapse" : true,
          "rowReorder": {
          "selector": "td:nth-child(2)"
          },
          "language": {
                  "decimal":        "",
                  "emptyTable":     "Tidak ada data tersedia",
                  "info":           "Tampil _START_ sampai _END_ dari _TOTAL_ data",
                  "infoEmpty":      "Tidak ada data",
                  "infoFiltered":   "Tersaring dari _MAX_ total entri",
                  "infoPostFix":    "",
                  "thousands":      ",",
                  "lengthMenu":     "Tampil _MENU_ data",
                  "loadingRecords": "Tunggu...",
                  "processing":     "Proses...",
                  "search":         "Cari:",
                  "zeroRecords":    "Tidak ada data yang cocok",
                  "paginate": {
                      "first":      "Pertama",
                      "last":       "Terakhir",
                      "next":       "Selanjutnya",
                      "previous":   "Sebelumnya"
                  },
                  "aria": {
                      "sortAscending":  ": activate to sort column ascending",
                      "sortDescending": ": activate to sort column descending"
                  }
          },
          "ajax" : {
              "type" : "GET",
              "url" : "/pemantauansitusweb/horizontal/reportopen/"+getelementreportmonth
          },
          "columns" : [
              { "title": "No", "data": 1, "width": "5%", "targets": [0] },
              { "title": "Bulan Pembaruan", "data": 3, "width": "40%", "targets": [1] },
              { "title": "Keterangan", "data": 4, "width": "40%", "targets": [2] },
              { "title": "Aksi", "data": null, "mRender": function(data, type, full) {
                  return Division('btn-action',
                    Action([
                        Anchor('btndetailopenreport', 'btn btn-custom btn-primary open', '', '', (full[0] === 2) ? '/pemantauansitusweb/horisontal/laporan/mingguan/' + full[2] : '/pemantauansitusweb/laporan/mingguan/' + full[2], 'Buka', Json(['date'], [full[2]]), ''),
                        Button('editreportbydate', 'btn btn-custom btn-warning edit', 'button', 'modal', '#reportbydatemodal', 'Ubah', Json(['id', 'date'], [full[2], full[2]])),
                        Anchor('buttondeletebydate', 'btn btn-custom btn-danger delete', '', '', '/pemantauansitusweb/destroybydate/' + full[2], 'Hapus', Json([],[]), '')
                    ])
                  );
              }, "width": "15%", "targets": [3] }
          ]
    });
  
    $('#reportopendetailtable').DataTable({
          "paging" : true,
          "scrollx" : true,
          "autoWidth" : false,
          "responsive": true,
          "processing" : true,
          "scrollCollapse" : true,
          "rowReorder": {
          "selector": "td:nth-child(2)"
          },
          "language": {
                  "decimal":        "",
                  "emptyTable":     "Tidak ada data tersedia",
                  "info":           "Tampil _START_ sampai _END_ dari _TOTAL_ data",
                  "infoEmpty":      "Tidak ada data",
                  "infoFiltered":   "Tersaring dari _MAX_ total entri",
                  "infoPostFix":    "",
                  "thousands":      ",",
                  "lengthMenu":     "Tampil _MENU_ data",
                  "loadingRecords": "Tunggu...",
                  "processing":     "Proses...",
                  "search":         "Cari:",
                  "zeroRecords":    "Tidak ada data yang cocok",
                  "paginate": {
                      "first":      "Pertama",
                      "last":       "Terakhir",
                      "next":       "Selanjutnya",
                      "previous":   "Sebelumnya"
                  },
                  "aria": {
                      "sortAscending":  ": activate to sort column ascending",
                      "sortDescending": ": activate to sort column descending"
                  }
          },
          "ajax" : {
              "type" : "GET",
              "url" : "/pemantauansitusweb/reportdetailopen/"+getelementreportdate
          },
          "columns" : [
              { "title": "No", "data": 0, "width": "5%", "targets": [0] },
              { "title": "Uraian", "data": 7, "width": "25%", "targets": [1] },
              { "title": "Alamat Situs Web", "data": 6, "width": "11%", "targets": [2] },
              { "title": "Status", "data": 2, "width": "11%", "targets": [3] },
              { "title": "Tanggal", "data": 9, "width": "11%", "targets": [4] },
              { "title": "Keterangan", "data": 3, "width": "11%", "targets": [5] },
              { "title": "Instansi", "data": 8, "width": "11%", "targets": [6] },
              { "title": "Aksi", "data": null, "mRender": function(data, type, full) {
                  return Division('btn-action',
                    Action([
                        Anchor('linkreportbydatedetails', 'btn btn-custom btn-primary link', '', '', full[6], 'Tautan', Json([], []), '_blank'),
                        Button('editreport', 'btn btn-custom btn-warning edit', 'button', 'modal', '#reportmodal', 'Ubah', Json(['id', 'status', 'information', 'dateupdate', 'website_id'], [full[1], full[2], full[3], full[4], full[5]])),
                        Anchor('buttondeletebydatedetails', 'btn btn-custom btn-danger delete', '', '', '/pemantauansitusweb/report/destroy/' + full[1], 'Hapus', Json([],[]), '')
                    ])
                  );
              }, "width": "15%", "targets": [7] }
          ]
    });
});