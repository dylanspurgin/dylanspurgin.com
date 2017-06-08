<style lang="scss" scoped>
    
</style>

<template>
    <div class="site-content">
        <h2>Contact</h2>
        <div class="ds-two-column--wrapper">
            <div class="contact-copy">
                <h3>Hello, I'd love to hear from you!</h3>
                <p>If you'd like to get in touch you
                    can send an email to <span class="strong">dylan<span>@</span>dylanspurgin.com</span>
                    or use the form on this page. Either way, I'll get back to
                    you as quickly as possible.</p>
            </div>
            <div class="ds-panel contact-form">
                <form @submit.prevent="submitForm" v-if="!formSubmitted">
                    <div class="form-group form-group-vertical">
                        <label for="name">Name</label>
                        <input v-model="name" class="form-control" name="name" type="text" />
                    </div>
                    <div class="form-group form-group-vertical">
                        <label for="email">Email<sup>*</sup> <span v-show="errors.has('email')" class="small help">{{ errors.first('email') }}</span></label>
                        <input v-validate="'required|email'"
                            data-vv-delay="1500"
                            v-model="email"
                            class="form-control" name="email" type="email" />
                    </div>
                    <div class="form-group form-group-vertical">
                        <label for="message">Message <small>(<span>{{ message.length }}</span> / <span>{{ maxLength }}</span>)</small></label>
                        <textarea rows="5" v-model="message" class="form-control" name="message"></textarea>
                    </div>
                    <button type="submit" class="button button-submit">Send</button>
                </form>

                <div v-if="formSubmitted && formSuccess" class="thanks">
                    <h3>Thanks!</h3>
                    <p>I'll respond to {{email}} just as quickly as I am able.</p>
                    <a href="#" v-on:click.stop.prevent="resetForm()">Send another message</a>
                </div>

                <div v-if="formSubmitted && !formSuccess" class="thanks">
                    <h3>Uh Oh!</h3>
                    <p>There was a problem submitting the contact form. Please <a href="#" v-on:click.stop.prevent="showForm()">try again</a>.</p>
                    <p>If the problem persists, send me an email to <span class="strong">dylan<span>@</span>dylanspurgin.com</span>.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'contact',
    data: () => ({
        name: '',   // data for the name on the form
        email: '',   // data for the email on the form
        message: '', // data for the message on the form
        maxLength: 500, // maximum length of the form message
        formSubmitted: false,
        formSuccess: false
    }),
    methods: {
        isValid: function () {
            var valid = this.email.indexOf('@') > 0
            return valid
        },
        submitForm: function () {
            this.$validator.validateAll().then(() => {
                this.$http({
                    url: process.env.API + '/contact.php',
                    method: 'POST',
                    body: {
                        name: this.name,
                        email: this.email,
                        message: this.message
                    }
                }).then(function (response) {
                    if (response.body.result.toLowerCase() === 'success') {
                        this.formSuccess = true
                        this.formSubmitted = true
                    } else {
                        this.formSuccess = false
                        this.formSubmitted = true
                    }
                }, function () {
                    this.formSuccess = false
                    this.formSubmitted = true
                })
            }).catch(() => {
                // Validation failed. Errors shown inline
            })
        },
        resetForm: function () {
            this.name = ''
            this.email = ''
            this.message = ''
            this.formSubmitted = false
            this.formSuccess = false
        },
        showForm: function () {
            this.formSubmitted = false
        }
    }
}
</script>
