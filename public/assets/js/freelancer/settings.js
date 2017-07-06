$(document).ready(function () {

    var employment = (function () {
        function prepareErros(response, modal) {
            if (response.status == true) {
                modal.modal("hide");
                location.reload();
            } else {
                for (var label in response.errors) {
                    modal.find("[name='"+label+"']").addClass('has-error');
                }
            }
        }
        return {
            addEmployment: function () {
                $.ajax({
                    url : window.baseUrl + '/freelancer/employment/add',
                    type : 'post',
                    data: $('#add_employment_form').serialize(),
                    dataType: 'json',
                    success: function (response) {
                        prepareErros(response, $('#add_employment_modal'));
                    }
                });
            },
            editEmployment: function () {
                $.ajax({
                    url : window.baseUrl + '/freelancer/employment/edit',
                    type : 'post',
                    data: $('#edit_employment_form').serialize(),
                    dataType: 'json',
                    success: function (response) {
                        prepareErros(response, $('#edit_employment_modal'));
                    }
                });
            },
            initEmploymentForm: function () {
                $('.edit_employment_btn').click(function (e) {
                    e.preventDefault();
                    var itemBlock = $(this).closest('.employment-item');
                    var editModal = $('#edit_employment_form');
                    editModal.find("[name='office_name']").val(itemBlock.find('.office_name').html());
                    editModal.find("[name='position']").val(itemBlock.find('.position').html());
                    editModal.find("[name='from']").val(itemBlock.find('.from').html());
                    editModal.find("[name='to']").val(itemBlock.find('.to').html());
                    editModal.find("[name='description']").html(itemBlock.find('.description').html());
                    editModal.find("[name='id']").val(itemBlock.find('.id').html());
                });
            }
        }
    })();

    var education = (function () {
        function prepareErros(response, modal) {
            if (response.status == true) {
                modal.modal("hide");
                location.reload();
            } else {
                for (var label in response.errors) {
                    modal.find("[name='"+label+"']").addClass('has-error');
                }
            }
        }
        return {
            addEducation: function () {
                $.ajax({
                    url : window.baseUrl + '/freelancer/education/add',
                    type : 'post',
                    data: $('#add_education_form').serialize(),
                    dataType: 'json',
                    success: function (response) {
                        prepareErros(response, $('#add_education_modal'));
                    }
                });
            },
            editEducation: function () {
                $.ajax({
                    url : window.baseUrl + '/freelancer/education/edit',
                    type : 'post',
                    data: $('#edit_education_form').serialize(),
                    dataType: 'json',
                    success: function (response) {
                        prepareErros(response, $('#edit_education_modal'));
                    }
                });
            },
            initEducationForm: function () {
                $('.edit_education_btn').click(function (e) {
                    e.preventDefault();
                    var itemBlock = $(this).closest('.education-item');
                    var editModal = $('#edit_education_form');
                    editModal.find("[name='university_name']").val(itemBlock.find('.university_name').html());
                    editModal.find("[name='degree']").val(itemBlock.find('.degree').html());
                    editModal.find("[name='from']").val(itemBlock.find('.from').html());
                    editModal.find("[name='to']").val(itemBlock.find('.to').html());
                    editModal.find("[name='description']").html(itemBlock.find('.description').html());
                    editModal.find("[name='id']").val(itemBlock.find('.id').html());
                });
            }
        }
    })();

    var portfolio = (function () {
        function prepareErros(response, modal) {
            if (response.status == true) {
                modal.modal("hide");
                location.reload();
            } else {
                for (var label in response.errors) {
                    modal.find("[name='"+label+"']").addClass('has-error');
                }
            }
        }
        return {
            addPortfolio: function (data) {
                $.ajax({
                    url : window.baseUrl + '/freelancer/portfolio/add',
                    type : 'post',
                    data: data,
                    cache:false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        prepareErros(response, $('#add_portfolio_modal'));
                    }
                });
            },
            editPortfolio: function (data) {
                $.ajax({
                    url : window.baseUrl + '/freelancer/portfolio/edit',
                    type : 'post',
                    data: data,
                    cache:false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        prepareErros(response, $('#edit_portfolio_modal'));
                    }
                });
            },
            initPortfolioForm: function () {
                $('.edit_portfolio_btn').click(function (e) {
                    e.preventDefault();
                    var itemBlock = $(this).closest('.portfolio-item');
                    var editModal = $('#edit_portfolio_form');
                    editModal.find("[name='title']").val(itemBlock.find('.title').html());
                    editModal.find("[name='description']").html(itemBlock.find('.description').html());
                    editModal.find("[name='id']").val(itemBlock.find('.id').html());
                });
            }
        }
    })();

    var additionalUser = (function () {
        return {
            subCatdata: [],
            categories: function () {
                $('#categories').select2({
                    placeholder: "Select a Category",
                    maximumSelectionLength: 3
                });
            },
            subCategories: function () {
                $('#sub_categories').select2({
                    placeholder: "Select a Sub Category",
                    maximumSelectionLength: 10
                    //data: this.subCatdata
                });
            },
            run: function () {
                this.categories();
                this.subCategories();
            },
            init: function () {
               /* $('#categories').on("select2:select", function (e) {
                    $('#subCategories').select2({data: this.subCatdata});
                });
                $('#categories').on("select2:unselect", function (e) {
                    $('#subCategories').select2({data: this.subCatdata});
                });*/

                $('#skills').select2({
                    placeholder: "Select a Skill",
                    maximumSelectionLength: 10,
                });

                $(document).find('.validateWithData').each(function () {
                   if ($(this).data('has-error')) {
                        $(this).next('span').find('.select2-selection').addClass('has-error');
                   }
                });

            }
        }
    })();


    education.initEducationForm();
    employment.initEmploymentForm();
    portfolio.initPortfolioForm();
    additionalUser.run();
    additionalUser.init();


    var addEditEvents = {
        run: function () {
            $('#add_education_form').submit(function (e) {
                e.preventDefault();
                education.addEducation();
            });

            $('#edit_education_form').submit(function (e) {
                e.preventDefault();
                education.editEducation();
            });

            $('#add_employment_form').submit(function (e) {
                e.preventDefault();
                employment.addEmployment();
            });

            $('#edit_employment_form').submit(function (e) {
                e.preventDefault();
                employment.editEmployment();
            });

            $('#add_portfolio_form').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                portfolio.addPortfolio(formData);
            });

            $('#edit_portfolio_form').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                portfolio.editPortfolio(formData);
            });
        }
    };

    addEditEvents.run();


});