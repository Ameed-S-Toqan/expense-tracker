
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('#expense-form');
    if (!form) return;

    const description = form.querySelector('#description');
    const amount = form.querySelector('#amount');
    const category = form.querySelector('#category_id');
    const date = form.querySelector('#expense_date');

    const setFieldValidity = (field, valid, message) => {
        field.classList.toggle('is-invalid', !valid);
        field.classList.toggle('is-valid', valid);

        const feedbackId = field.getAttribute('aria-describedby');
        const feedback = feedbackId
            ? document.getElementById(feedbackId)
            : null;

        if (feedback && message) {
            feedback.textContent = message;
        }

        return valid;
    };

    const validateDescription = () => {
        const value = description.value.trim();

        const valid = value.length > 0 && value.length <= 255;

        return setFieldValidity(
            description,
            valid,
            valid
                ? ''
                : 'Please enter a description (255 characters or fewer).'
        );
    };

    const validateAmount = () => {
        const value = Number(amount.value);

        const valid =
            amount.value.trim() !== '' &&
            Number.isFinite(value) &&
            value > 0 &&
            value <= 99999999.99;

        return setFieldValidity(
            amount,
            valid,
            valid ? '' : 'Enter an amount greater than zero.'
        );
    };

    const validateCategory = () => {
        const valid = category.value !== '';

        return setFieldValidity(
            category,
            valid,
            valid ? '' : 'Please select a category.'
        );
    };

    // Validate the date without converting it to UTC.
    const validateDate = () => {
        const value = date.value;
        const match = /^(\d{4})-(\d{2})-(\d{2})$/.exec(value);

        let valid = false;

        if (match) {
            const year = Number(match[1]);
            const month = Number(match[2]);
            const day = Number(match[3]);

            const parsed = new Date(year, month - 1, day);

            valid =
                parsed.getFullYear() === year &&
                parsed.getMonth() === month - 1 &&
                parsed.getDate() === day;
        }

        return setFieldValidity(
            date,
            valid,
            valid ? '' : 'Please choose a valid date.'
        );
    };

    description.addEventListener('input', validateDescription);
    amount.addEventListener('input', validateAmount);
    category.addEventListener('change', validateCategory);
    date.addEventListener('change', validateDate);

    form.addEventListener('submit', (event) => {
        const checks = [
            validateDescription(),
            validateAmount(),
            validateCategory(),
            validateDate()
        ];

        if (checks.some((valid) => !valid)) {
            event.preventDefault();

            const firstInvalid = form.querySelector('.is-invalid');

            if (firstInvalid) {
                firstInvalid.focus();
            }
        }
    });
});
