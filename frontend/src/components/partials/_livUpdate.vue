<template>
    <div class="row">
        <div class="container live-update">
            <div class="detail-wrapper">
                <div class="detail-name">Last Update</div>
                <div class="detail-value"> {{ localUpdates.update_date_time | defaultDateFormat }}</div>
            </div>

            <div class="detail-wrapper">
                <div class="detail-name">New Cases</div>
                <div class="detail-value"> {{ localUpdates.local_new_cases }}</div>
            </div>

            <div class="detail-wrapper">
                <div class="detail-name">Total Cases</div>
                <div class="detail-value"> {{ localUpdates.local_total_cases }}</div>
            </div>

            <div class="detail-wrapper">
                <div class="detail-name">Total Hospitalized</div>
                <div class="detail-value"> {{ localUpdates.local_total_number_of_individuals_in_hospitals }}</div>
            </div>

            <div class="detail-wrapper">
                <div class="detail-name">Total Deaths</div>
                <div class="detail-value"> {{ localUpdates.local_deaths }}</div>
            </div>

            <div class="detail-wrapper">
                <div class="detail-name">Total Recovered</div>
                <div class="detail-value"> {{ localUpdates.local_recovered }}</div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data() {
            return {}
        },
        props: {
            localUpdates: {
                type: Object
            },
        },
    };
</script>

<style>

</style>
