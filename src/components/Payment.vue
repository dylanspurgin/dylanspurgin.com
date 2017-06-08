<style lang="scss" scoped>
@media (max-width: $mobile-max-width) {
    .contact-content-wrapper {
        display: flex;
        flex-direction: column;
    }
}
@media (min-width: $tablet-min-width) {
    .contact-content-wrapper {
        display: flex;
        flex-direction: row;
    }
    .contact-form {
        min-width: 60%;
        padding: 40px;
        margin-left: 40px;
        background-color: #ccc;
        border-top: solid 4px $brand-color;
    }
}
</style>

<template>
<div class="site-content">
    <h2>Payment</h2>
    <div class="ds-two-column--wrapper">
        <div>
            <p>Payments are processed by
                <a href="https://stripe.com/">Stripe</a>. Card
                information is sent securely and not stored by dylanspurgin.com.</p>
        </div>
        <div class="ds-panel">

            <div v-if="!formSubmitted || (formSubmitted && !formSuccess)">

                <div class="form-group form-group-vertical">
                    <label for="name">Name on card</label>
                    <input v-model="name" v-validate="'required'"
                        data-vv-delay="1500" class="form-control" name="name" type="text" />
                </div>

                <div class="form-group form-group-vertical">
                    <label for="email">Email <small>(optional, receipt will be sent to this address)</small></label>
                    <span v-show="errors.has('email')" class="small help">{{ errors.first('email') }}</span>
                    <input v-validate="'required|email'"
                        data-vv-delay="1500"
                        v-model="email"
                        class="form-control" name="email" type="email" />
                </div>

                <div class="form-group form-group-vertical">
                    <label for="description">Invoice # or reason for payment <small>(optional)</small></label>
                    <input v-model="description" v-validate="'required'"
                        data-vv-delay="1500" class="form-control" name="description" type="text" />
                </div>

                <div class="form-group form-group-vertical">
                    <label for="amount">Amount</label>
                    <span class="amount-currency-type">$</span><!-- no break
                    --><input v-model="amount" v-validate="'required'"
                        data-vv-delay="1500" class="form-control amount-input"
                        name="amount" type="number" step=".01" max="9999.99" />
                </div>

                <div class="form-group form-group-vertical">
                    <label for="message">Credit Card Info</label>
                    <card class='stripe-card' :class='{ ccComplete }'
                        :stripe='stripeKey'
                        :options='stripeOptions'
                        @change='ccComplete = $event.complete' />
                </div>

                <button class='button' @click='pay' :disabled='!formIsValid() || submitting'>
                    <span v-if="!submitting">Submit Payment</span>
                    <span v-if="submitting">Submitting Payment...</span>
                </button>
            </div>

            <div v-if="formSubmitted && formSuccess" class="thanks">
                <h3>Thanks!</h3>
                <p>Your payment of ${{chargedAmount}} was successfully posted.</p>
                <p>This charge will appear on your statement as {{chargeDescriptor}}.</p>
            </div>

            <div v-if="formSubmitted && !formSuccess" class="thanks">
                <h3>Oops!</h3>
                <p class="error">There was a problem while processing your payment.</p>
                <pre v-if="errorMessage">{{errorMessage}}</pre>
                <p>If the problem persists, send me an email to <span class="strong">dylan<span>@</span>dylanspurgin.com</span>.</p>
            </div>

        </div>
    </div>
</div>
</template>

<script>
import {Card, createToken} from 'vue-stripe-elements'

export default {
    name: 'contact',
    data: () => ({
        ccComplete: false,
        stripeKey: process.env.STRIPE_KEY,
        formSubmitted: false,
        formSuccess: false,
        stripeOptions: {},
        name: '',
        email: '',
        amount: '',
        message: '',
        submitting: false,
        chargedAmount: '',
        chargeDescriptor: '',
        errorMessage: false
    }),
    methods: {
        pay () {
            this.submitting = true
            createToken().then(data => {
                this.$http({
                    url: process.env.API + '/payment.php',
                    method: 'POST',
                    body: {
                        name: this.name,
                        email: this.email,
                        description: this.description,
                        amount: this.amount * 100,
                        stripeToken: data.token.id
                    }
                }).then(function (response) {
                    if (response.body.result.toLowerCase() === 'success') {
                        this.chargedAmount = response.body.charge.amount / 100
                        this.chargeDescriptor = response.body.charge.statement_descriptor
                        this.errorMessage = false
                        this.formSuccess = true
                        this.formSubmitted = true
                    } else {
                        if (response.body.result.toLowerCase() === 'error' && response.body.message) {
                            this.errorMessage = response.message
                        }
                        this.formSuccess = false
                        this.formSubmitted = true
                        this.submitting = false
                    }
                }, function (response) {
                    console.debug('error response', response)
                    if (response.body.result.toLowerCase() === 'error' && response.body.message) {
                        this.errorMessage = response.body.message
                    }
                    this.formSuccess = false
                    this.formSubmitted = true
                    this.submitting = false
                })
            })
        },
        formIsValid () {
            return this.ccComplete && !this.errors.any()
        }
    },
    components: {
        Card
    },
    created: function () {
        if (this.$route.query.name) {
            this.name = this.$route.query.name
        }
        if (this.$route.query.email) {
            this.email = this.$route.query.email
        }
        if (this.$route.query.amount) {
            this.amount = this.$route.query.amount
        }
        if (this.$route.query.description) {
            this.description = this.$route.query.description
        }
    },
    watch: {
        amount: function (val) {
            let str = val + ''
            let dotIndex = str.indexOf('.')
            if (dotIndex > 0) {
                this.amount = parseFloat(str.substring(0, dotIndex) + '.' + str.substring(dotIndex + 1, dotIndex + 3))
            }
        }
    }
}
</script>
