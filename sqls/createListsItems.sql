CREATE TABLE public.lists_items
(
    list_id_i integer NOT NULL,
    pid_i integer NOT NULL
);

ALTER TABLE IF EXISTS public.lists_items
    OWNER to postgres;