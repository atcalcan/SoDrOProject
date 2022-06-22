-- Table: public.preferences

-- DROP TABLE IF EXISTS public.preferences;

CREATE TABLE IF NOT EXISTS public.preferences
(
    "idUser" integer NOT NULL,
    "acidPref" character varying COLLATE pg_catalog."default",
    "naturalPref" character varying COLLATE pg_catalog."default",
    "lowcalPref" character varying COLLATE pg_catalog."default",
    "milkPref" character varying COLLATE pg_catalog."default",
    "cofePref" character varying COLLATE pg_catalog."default",
    "gustPref" character varying COLLATE pg_catalog."default",
    "aromaPref" character varying COLLATE pg_catalog."default",
    CONSTRAINT preferences_pkey PRIMARY KEY ("idUser")
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.preferences
    OWNER to postgres;
