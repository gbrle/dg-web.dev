export function isEmpty (value: unknown): boolean {

    if (value === null || value === undefined || value === '') {
        return true;
    }

    if (typeof value === 'object') {
        return Object.keys(value).length === 0;
    }

    return Array.isArray(value) && value.length === 0;
}