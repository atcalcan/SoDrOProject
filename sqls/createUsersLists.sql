-- Table: public.users_lists

-- DROP TABLE IF EXISTS public.users_lists;

CREATE TABLE IF NOT EXISTS public.users_lists
(
    list_id integer NOT NULL,
    uid_lists integer NOT NULL,
    list_name character varying COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT users_lists_pkey PRIMARY KEY (list_id)
    )

    TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.users_lists
    OWNER to postgres;