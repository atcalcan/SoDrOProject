-- Table: public.users

-- DROP TABLE IF EXISTS public.users;

CREATE TABLE IF NOT EXISTS public.users
(
    id integer NOT NULL DEFAULT nextval
(
    ''users_id_seq''::regclass
),
    username character varying COLLATE pg_catalog."default" NOT NULL,
    passwd character varying COLLATE pg_catalog."default" NOT NULL,
    email character varying COLLATE pg_catalog."default" NOT NULL,
    "profilePic" character varying COLLATE pg_catalog."default",
    CONSTRAINT users_pkey PRIMARY KEY
(
    id
)
    )
    TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.users
    OWNER to postgres;