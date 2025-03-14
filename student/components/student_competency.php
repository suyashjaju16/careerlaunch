<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header card-body py-md-4 py-0" id="headingCommunication">
            <div class="row align-items-center">
                <?= generate_competency_results($competency_data, "communication_results", "#3ca4fe", "Communication", "./assets/images/nace-icons/nace-communication-black-line-art-icon.png", "communication") ?>
                <div class="col-md-1 col-12 d-flex flex-row flex-md-column align-items-center justify-content-center">
                    <button class="accordion-button collapsed btn-up "
                            type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseCommunication"
                            aria-expanded="false" aria-controls="collapseCommunication">
                        <span class="d-md-none text-nowrap px-2 text-dark fs-6">Read More</span>
                    </button>
                </div>
            </div>
            

        </h2>
        <div id="collapseCommunication" class="accordion-collapse collapse" aria-labelledby="headingCommunication" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <?= generate_competency($competency_data["communication"], "#3ca4fe"); ?>
                <h5 class="card-title text-black mb-3">
                    Recommendations
                </h5>

                <div class="card border-2">
                    <div class="card-body" style="color:black">
                        <p class="recommendations-headings" dir="ltr"><strong>Engage in Class
                                Discussions</strong></p>
                        <p dir="ltr">💬 Actively participate in class discussions and group
                            projects. When possible, prepare insightful questions and
                            comments beforehand to contribute meaningfully to the
                            conversation. You will deepen your understanding of the subject
                            matter and improve your communication skills.</p>
                        <p class="recommendations-headings" dir="ltr">
                            <strong><br></strong><strong>Be Mindful of Nonverbal
                                Communication</strong>
                        </p>
                        <p dir="ltr">👀 Pay attention to your body language, facial
                            expressions, and eye contact during interactions, as well as the
                            nonverbal communication of others. <a class="text-primary"
                                href="https://www.google.com/" target="_blank">Advance tip
                            </a>: mirror positive
                            nonverbal cues of others to show understanding and
                            attentiveness.</p>
                        <p class="recommendations-headings" dir="ltr">
                            <strong><br></strong><strong>Prepare and Deliver
                                Presentations</strong>
                        </p>
                        <p dir="ltr">🎤 Volunteer to present in class, at meetings, or other
                            situations to practice your verbal and non-verbal communication
                            skills. By honing your presentation behaviors, you become a more
                            effective communicator.</p>
                        <p class="recommendations-headings" dir="ltr">
                            <strong><br></strong><strong>Practice Active Listening
                                Skills</strong>
                        </p>
                        <p dir="ltr">👂Practice active listening during conversations by
                            giving your full attention to the speaker and genuinely engaging
                            with their message. Avoid interrupting and focus on
                            understanding their perspective before formulating a response.
                            Reflect back on what the speaker has said to demonstrate
                            comprehension and empathy. You will build strong relationships
                            when you consistently use active listening behaviors. </p>
                        <p class="recommendations-headings" dir="ltr">
                            <strong><br></strong><strong>Talk to Professionals in
                                Career Roles that Interest You</strong>
                        </p>
                        <p dir="ltr">🕵🏼 Set up time to talk with professionals in careers
                            you're interested in to gain information. Utilize your school
                            resources and guidance from your career center to connect with
                            individuals in your desired field.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingCommunication">
            <button class="accordion-button collapsed p-0 row" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCommunication" aria-expanded="false" aria-controls="collapseCommunication">
                <?= generate_competency_results($competency_data, "communication_results", "#3ca4fe", "Communication", "./assets/images/nace-icons/nace-communication-black-line-art-icon.png", "communication") ?>
            </button>
        </h2>
        <div id="collapseCommunication" class="accordion-collapse collapse" aria-labelledby="headingCommunication" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <?= generate_competency($competency_data["communication"], "#3ca4fe"); ?>
                <h5 class="card-title text-black mb-3">
                    Recommendations
                </h5>

                <div class="card border-2">
                    <div class="card-body" style="color:black">
                        <p class="recommendations-headings" dir="ltr"><strong>Engage in Class
                                Discussions</strong></p>
                        <p dir="ltr">💬 Actively participate in class discussions and group
                            projects. When possible, prepare insightful questions and
                            comments beforehand to contribute meaningfully to the
                            conversation. You will deepen your understanding of the subject
                            matter and improve your communication skills.</p>
                        <p class="recommendations-headings" dir="ltr">
                            <strong><br></strong><strong>Be Mindful of Nonverbal
                                Communication</strong>
                        </p>
                        <p dir="ltr">👀 Pay attention to your body language, facial
                            expressions, and eye contact during interactions, as well as the
                            nonverbal communication of others. <a class="text-primary"
                                href="https://www.google.com/" target="_blank">Advance tip
                            </a>: mirror positive
                            nonverbal cues of others to show understanding and
                            attentiveness.</p>
                        <p class="recommendations-headings" dir="ltr">
                            <strong><br></strong><strong>Prepare and Deliver
                                Presentations</strong>
                        </p>
                        <p dir="ltr">🎤 Volunteer to present in class, at meetings, or other
                            situations to practice your verbal and non-verbal communication
                            skills. By honing your presentation behaviors, you become a more
                            effective communicator.</p>
                        <p class="recommendations-headings" dir="ltr">
                            <strong><br></strong><strong>Practice Active Listening
                                Skills</strong>
                        </p>
                        <p dir="ltr">👂Practice active listening during conversations by
                            giving your full attention to the speaker and genuinely engaging
                            with their message. Avoid interrupting and focus on
                            understanding their perspective before formulating a response.
                            Reflect back on what the speaker has said to demonstrate
                            comprehension and empathy. You will build strong relationships
                            when you consistently use active listening behaviors. </p>
                        <p class="recommendations-headings" dir="ltr">
                            <strong><br></strong><strong>Talk to Professionals in
                                Career Roles that Interest You</strong>
                        </p>
                        <p dir="ltr">🕵🏼 Set up time to talk with professionals in careers
                            you're interested in to gain information. Utilize your school
                            resources and guidance from your career center to connect with
                            individuals in your desired field.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Repeat this structure for each competency -->
</div>
