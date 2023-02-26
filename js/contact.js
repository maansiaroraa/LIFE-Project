$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#contact_form").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      fullname: "required",
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      message: "required",
    },
    // Specify validation error messages
    messages: {
      fullname: "Please enter your Name.",
      email: "Please enter a valid Email Address.",
      message: "Please write a Message."
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});