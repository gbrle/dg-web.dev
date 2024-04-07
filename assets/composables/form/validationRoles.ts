import { isEmpty } from "@/composables/utils/isEmpty";

export function requiredRule (value: any) {
    return !isEmpty(value) || ('Ce champ est obligatoire.');
}

export function emailRule (value: any) {
    if (isEmpty(value)) {
        return true;
    }
    const re =
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (Array.isArray(value)) {
        return value.every(val => re.test(String(val)));
    }

    return re.test(String(value)) || "Email is invalid.";
}

export function maxRule (value: any, length: any): any {
    if (isEmpty(value)) {
        return true;
    }

    if (Array.isArray(value)) {
        return value.every(val => maxRule(val, length));
    }

    return [...String(value)].length <= Number(length) || ('le champs ne doit pas contenir plus de ' + length + 'caratères');
}

export function minRule (value: any, length: any): any {
    if (isEmpty(value)) {
        return true;
    }

    if (Array.isArray(value)) {
        return value.every(val => minRule(val, length));
    }

    return [...String(value)].length >= Number(length) || ('le champs ne doit pas contenir moins de ' + length + 'caratères');
}

export function maxValueRule (value: unknown, max: string | number): any {
    if (isEmpty(value)) {
        return true;
    }

    if (Array.isArray(value)) {
        return value.every(val => maxValueRule(val, max));
    }

    return (Number(value) <= Number(max)) || ('La valeur doit être inférieur ou égale à ' + max);
}

export function minValueRule (value: unknown, min: string | number) {
    if (isEmpty(value)) {
        return true;
    }

    if (Array.isArray(value)) {
        return value.every(val => maxValueRule(val, min));
    }

    return (Number(value) >= Number(min)) || ('La valeur doit être supérieure ou égale à ' + min);
}

export function numericRule (value: unknown) {
    const ar = /^[٠١٢٣٤٥٦٧٨٩]+$/;
    const en = /^[0-9]+$/;

    if (isEmpty(value)) {
        return true;
    }

    return (en.test(String(value)) || ar.test(String(value))) || "la valeur doit être numérique.";
}

export function integerRule (value: any) {

    if (isEmpty(value) || Number.isInteger(parseInt((value)))) {
        return true;
    }

    return "la valeur doit être un entier";
}

export function fileSizeRule (files: any, limit: any) {
    if (files instanceof Array && limit !== -1) {
        const size = files.reduce((filesSize, file) => {
            if (file instanceof File) {
                filesSize += file.size;
            }
            return filesSize;
        }, 0);

        if ((size / 1e+6).toFixed(2) <= limit) {
            return true;
        }

        return 'La taille des fichiers dépasse la limite de ' + limit + ' MB';
    }
}