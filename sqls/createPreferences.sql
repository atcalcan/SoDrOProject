-- Table: public.preferences

DROP TABLE IF EXISTS public.preferences;

CREATE TABLE IF NOT EXISTS public.preferences
(
    id_user integer NOT NULL,
    acid_pref character varying COLLATE pg_catalog."default",
    natural_pref character varying COLLATE pg_catalog."default",
    lowcal_pref character varying COLLATE pg_catalog."default",
    milk_pref character varying COLLATE pg_catalog."default",
    cofe_pref character varying COLLATE pg_catalog."default",
    gust_pref character varying COLLATE pg_catalog."default",
    aroma_pref character varying COLLATE pg_catalog."default",
    CONSTRAINT preferences_pkey PRIMARY KEY (id_user)
    )

    TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.preferences
    OWNER to postgres;