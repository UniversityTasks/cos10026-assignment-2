<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="GOI Cinemas - Enquire" />
    <meta name="keywords" content="HTML,CSS,Javascript" />
    <meta name="author" content="Gang of Islands" />
    <link rel="stylesheet" href="./styles/style.css">
    <title>GOI Cinemas - Enquire</title>
</head>

<body id="enquiryBG">
    <?php include_once 'includes/menu.php'; ?>

    <div id="enquiryContainer">
        <form id="enquiryForm" method='post' action="https://mercury.swin.edu.au/it000000/formtest.php">
            <fieldset class="formFieldset">
                <legend>Your details</legend>
                <div class="multi-line-form">
                    <div class="formGroup">
                        <label for="firstname">First Name: </label>
                        <input type="text" name="firstname" id="firstname" pattern="[A-Za-z]{1,25}" placeholder="FirstName" required />
                    </div>

                    <div class="formGroup">
                        <label for="lastname">Last Name: </label>
                        <input type="text" name="lastname" id="lastname" pattern="[A-Za-z]{1,25}" placeholder="LastName" required />
                    </div>
                </div>

                <div class="formGroup">
                    <label for="email">Email: </label>
                    <input type="email" name="email" id="email" placeholder="name@email.com " required />
                </div>

                <div class="formGroup">
                    <label for="phone">Phone: </label>
                    <input type="text" name="phone" id="phone" pattern="[0-9]{10}" placeholder="0123456789" required />
                </div>

                <div class="multi-line-form">
                    <div class="formGroup">
                        <label for="street">Street: </label>
                        <input type="text" name="street" id="street" maxlength="40" placeholder="Street Name" required />
                    </div>

                    <div class="formGroup">
                        <label for="suburb">Suburb: </label>
                        <input type="text" name="suburb" id="suburb" maxlength="20" placeholder="Suburb" required />
                    </div>
                </div>

                <div class="multi-line-form">
                    <div class="formGroup">
                        <label for="state">State: </label>
                        <select name="state" id="state">
                            <option value="">Please Select</option>
                            <option value="NSW">New South Wales</option>
                            <option value="VIC" selected>Victoria</option>
                            <option value="WA">Western Australia</option>
                            <option value="TAS">Tasmania</option>
                            <option value="NT">Northern Territory</option>
                            <option value="ACT">Australian Capital Territory</option>
                            <option value="QLD">Queensland</option>
                            <option value="SA">South Australia</option>
                        </select>
                    </div>

                    <div class="formGroup">
                        <label for="postcode">Post code: </label>
                        <input type="text" name="postcode" id="postcode" pattern="[0-9]{4}" placeholder="0123" required />
                    </div>
                </div>
            </fieldset>

            <fieldset class="formFieldset">
                <legend>Your Enquiry</legend>

                <div class="formGroup">
                    <p>Preferred contact method: </p>
                    <input type="radio" id="email_" name="enquiry" value="email" checked="checked" />
                    <label for="email_">Email</label>

                    <input type="radio" id="post" name="enquiry" value="post" />
                    <label for="post">Post</label>

                    <input type="radio" id="phone_" name="enquiry" value="phone" />
                    <label for="phone_">Phone</label>
                </div>

                <div class="formGroup">
                    <p>Product Featues: </p>
                    <p>
                        <input type="checkbox" id="feature1" name="feature1" value="adultsTickets" checked="checked" />
                        <label for="feature1">Adults Tickets</label>
                    </p>
                    <p>
                        <input type="checkbox" id="feature2" name="feature2" value="childrenTickets" />
                        <label for="feature2">Children Tickets</label>
                    </p>
                    <p>
                        <input type="checkbox" id="feature3" name="feature3" value="seniorsTickets" />
                        <label for="feature3">Seniors Tickets</label>
                    </p>
                    <p>
                        <input type="checkbox" id="feature4" name="feature4" value="studentsTickets" />
                        <label for="feature4">Students Tickets</label>
                    </p>
                    <p>
                        <input type="checkbox" id="feature5" name="feature5" value="onlineBooking" />
                        <label for="feature5">Online Booking</label>
                    </p>
                    <p>
                        <input type="checkbox" id="feature6" name="feature6" value="others" />
                        <label for="feature6">Others</label>
                    </p>
                </div>

                <div class="formGroup">
                    <label for="genre">Movie Genre: </label>
                    <select name="genre" id="genre">
                        <option value="">Please Select</option>
                        <option value="action" selected="selected">Action</option>
                        <option value="drama">Drama</option>
                        <option value="comedy">Comedy</option>
                        <option value="thriller">Thriller</option>
                        <option value="horror">Horror</option>
                        <option value="romance">Romance</option>
                        <option value="others">Others</option>
                    </select>
                </div>

                <div class="formGroup">
                    <label for="comments">Comments: </label>
                    <textarea id="comments" name="comments" rows="6" placeholder="Write your enquiry here..." required></textarea>
                </div>

                <div class="enquirySubmitBtn">
                    <input type="submit" value="Send Enquiry">
                </div>
            </fieldset>

            <div id="enquiryFormImg">
                <p>Enquiry</p>
            </div>
        </form>
    </div>
    
    <?php include_once 'includes/footer.php'; ?>  
</body>

</html>