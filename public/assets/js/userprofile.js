$(document).ready(function () {
    $("#add_education").click(function (e) {
        e.preventDefault();

        var html = `<div class="card mb-4">
        <div class="card-body">
            <span onclick="remove_section(this)" class="position-absolute" style="top: 10px; right: 15px; cursor: pointer;"><i class="fa fa-close"></i></span>
            <div class="form-outline mb-4">
                <label class="form-label fw-bold text-secondary">Degree</label>
                <input type="text" id="degree_title" name="degree_title[]"
                    class="form-control" placeholder="Degree" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label fw-bold text-secondary">Institute</label>
                    <input type="text" id="institute" name="institute[]"
                    class="form-control" placeholder="Institute" />
            </div>
            <div class="row mb-4">
                <div class="col-sm-6 col-12">
                <div class="form-outline">
                <label class="form-label fw-bold text-secondary">Start Date</label>
                        <input type="date" id="edu_start_date"
                            name="edu_start_date[]" class="form-control" />
                    </div>
                    </div>
                    <div class="col-sm-6 col-12">
                    <div class="form-outline">
                        <label class="form-label fw-bold text-secondary">End Date</label>
                        <input type="date" id="edu_end_date"
                        name="edu_end_date[]" class="form-control" />
                    </div>
                    </div>
            </div>
            <div class="form-outline mb-4">
            <label class="form-label fw-bold text-secondary">Degree Description</label>
                    <textarea class="form-control" placeholder="Descripton" id="education_description" name="education_description[]"
                    rows="4"></textarea>
            </div>
        </div>
        </div>`;

        $(".education_section").append(html);

    });

    $("#add_experience").click(function (e) {
        e.preventDefault();

        var html = `<div class="card mb-4">
        <div class="card-body">
            <span onclick="remove_section(this)" class="position-absolute" style="top: 10px; right: 15px; cursor: pointer;"><i class="fa fa-close"></i></span>
            <div class="form-outline mb-4">
                <label class="form-label fw-bold text-secondary">Job Title</label>
                <input type="text" id="job_title" name="job_title[]"
                    class="form-control" placeholder="Job Title" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label fw-bold text-secondary">Organization</label>
                <input type="text" id="organization"
                    name="organization[]" class="form-control"
                    placeholder="Organization" />
            </div>
            <div class="row mb-4">
                <div class="col-sm-6 col-12">
                    <div class="form-outline">
                        <label class="form-label fw-bold text-secondary">Start Date</label>
                        <input type="date" id="job_start_date"
                            name="job_start_date[]"
                            class="form-control" />
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="form-outline">
                        <label class="form-label fw-bold text-secondary">End Date</label>
                        <input type="date" id="job_end_date"
                            name="job_end_date[]" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label fw-bold text-secondary">Job Description</label>
                <textarea class="form-control" placeholder="Job Descripton" id="job_description" name="job_description[]"
                    rows="4"></textarea>
            </div>
        </div>
        </div>`;

        $(".experience_section").append(html);

    });

    $("#add_project").click(function (e) {
        e.preventDefault();

        var html = `<div class="card mb-4">
        <div class="card-body">
            <span onclick="remove_section(this)" class="position-absolute" style="top: 10px; right: 15px; cursor: pointer;"><i class="fa fa-close"></i></span>
            <div class="form-outline mb-4">
                <label class="form-label fw-bold text-secondary">Project Title</label>
                <input type="text" id="project_title"
                    name="project_title[]" class="form-control"
                    placeholder="Project Title" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label fw-bold text-secondary">Project Description</label>
                <textarea class="form-control" placeholder="Project Descripton" id="project_description"
                    name="project_description[]" rows="4"></textarea>
            </div>
        </div>
        </div>`;

        $(".project_section").append(html);

    });

    $("#add_skill").click(function (e) {
        e.preventDefault();

        var html = `<div class="card mb-4">
        <div class="card-body">
            <span onclick="remove_section(this)" class="position-absolute" style="top: 10px; right: 15px; cursor: pointer;"><i class="fa fa-close"></i></span>
            <div class="row">
                <div class="col-10">
                    <div class="form-outline">
                        <label class="form-label fw-bold text-secondary">Add Skill</label>
                        <input type="text" id="skill_name" name="skill_name[]" class="form-control" placeholder="Add Skill" value="" />
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-outline">
                    <label class="form-label fw-bold text-secondary">Percentage</label>
                        <div class="input-group">
                            <input type="number" step="5"
                                id="skill_percentage"
                                name="skill_percentage[]" placeholder="%"
                                class="form-control"
                                aria-describedby="percentage">
                            <span class="input-group-text"
                                id="percentage">%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>`;

        $(".skill_section").append(html);

    });

    $("#add_language").click(function (e) {
        e.preventDefault();
    
        // AJAX request to fetch languages from the server
        $.ajax({
            url: '/getlanguages', // The route to get languages
            method: 'GET',
            success: function(response) {
                var languageOptions = '';
                
                // Loop through the response (languages) to build the options
                response.forEach(function(language) {
                    languageOptions += `<option value="${language.code}">${language.name}</option>`;
                });
    
                var html = `
                    <div class="card mb-4">
                        <div class="card-body">
                            <span onclick="remove_section(this)" class="position-absolute" style="top: 10px; right: 15px; cursor: pointer;"><i class="fa fa-close"></i></span>
                            <div class="row">
                                <div class="col-10">
                                    <div class="form-outline">
                                        <label class="form-label fw-bold text-secondary">Add Language</label>
                                        <select class="form-control" id="language" name="language[]">
                                            <option value="">Add Language</option>
                                            ${languageOptions} <!-- Dynamically added options -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-outline">
                                        <label class="form-label fw-bold text-secondary">Level</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="percentage">Level</span>
                                            <select id="language_level" name="language_level[]" placeholder="level" class="form-control" aria-describedby="percentage">
                                                <option value="">Select level</option>
                                                <option value="Native">Native</option>
                                                <option value="Fluent">Fluent</option>
                                                <option value="Basic">Basic</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
    
                $(".language_section").append(html); // Append the new language section
            },
            error: function(error) {
                console.log("Error fetching languages:", error);
            }
        });
    });
    

    $("#add_interest").click(function (e) {
        e.preventDefault();

        var html = `<div class="card mb-4">
        <div class="card-body">
            <span onclick="remove_section(this)" class="position-absolute" style="top: 10px; right: 15px; cursor: pointer;"><i class="fa fa-close"></i></span>
            <div class="form-outline">
                <label class="form-label fw-bold text-secondary">Add Interest</label>
                <input type="text" id="interest" name="interest[]"
                    class="form-control" placeholder="Add Interest" />
            </div>
        </div>
        </div>`;

        $(".interest_section").append(html);

    });


});

function remove_section(element) {
    $(element).closest(".card").remove();
}