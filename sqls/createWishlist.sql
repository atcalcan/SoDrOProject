-- Table: public.wishlist

DROP TABLE IF EXISTS public.wishlist;

CREATE TABLE IF NOT EXISTS public.wishlist
(
    id_user_wish
    integer
    NOT
    NULL,
    id_produs_wish
    integer
    NOT
    NULL
)
    TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.wishlist
    OWNER to postgres;