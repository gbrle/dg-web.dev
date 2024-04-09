export enum RolesLibelle {
    ROLE_ADMIN = 'Administrateur',
    ROLE_VISITEUR = 'Visiteur'
}

export enum RolesSlug {
    ROLE_ADMIN = 'ROLE_ADMIN',
    ROLE_VISITEUR = 'ROLE_VISITEUR'
}

export const rolesForSelect  = {
    select: { libelle: RolesLibelle.ROLE_ADMIN, value: RolesSlug.ROLE_VISITEUR },
    items: [
        { libelle: RolesLibelle.ROLE_ADMIN, value: RolesSlug.ROLE_ADMIN },
        { libelle: RolesLibelle.ROLE_VISITEUR, value: RolesSlug.ROLE_VISITEUR },
    ],
}
