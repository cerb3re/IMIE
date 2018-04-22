package com.moventes.com.imdb;

import android.arch.persistence.room.Entity;
import android.arch.persistence.room.Ignore;
import android.arch.persistence.room.PrimaryKey;
import android.os.Parcel;
import android.os.Parcelable;
import android.support.annotation.NonNull;

@Entity(tableName = "movies")
public class Movie implements Parcelable {

    @NonNull
    @PrimaryKey
    private String id;

    private String title;

    private String poster;

    private String year;

    private String director;

    private String actors;

    private String plot;

    public Movie(
            String id,
            String title,
            String poster,
            String year,
            String director,
            String actors,
            String plot
    ) {
        this.id = id;
        this.title = title;
        this.poster = poster;
        this.year = year;
        this.director = director;
        this.actors = actors;
        this.plot = plot;
    }

    @Ignore
    private Movie(Parcel in) {
        this.id = in.readString();
        this.title = in.readString();
        this.poster = in.readString();
        this.year = in.readString();
        this.director = in.readString();
        this.actors = in.readString();
        this.plot = in.readString();
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getPoster() {
        return poster;
    }

    public String getYear() {
        return year;
    }

    public String getDirector() {
        return director;
    }

    public String getActors() {
        return actors;
    }

    public String getPlot() {
        return plot;
    }

    public void setPoster(String poster) {
        this.poster = poster;
    }

    public void setYear(String year) {
        this.year = year;
    }

    public void setDirector(String director) {
        this.director = director;
    }

    public void setActors(String actors) {
        this.actors = actors;
    }

    public void setPlot(String plot) {
        this.plot = plot;
    }

    @Ignore
    @Override
    public int describeContents() {
        return 0;
    }

    @Ignore
    public void writeToParcel(Parcel out, int flags) {
        out.writeString(this.id);
        out.writeString(this.title);
        out.writeString(this.poster);
        out.writeString(this.year);
        out.writeString(this.director);
        out.writeString(this.actors);
        out.writeString(this.plot);
    }

    @Ignore
    public static final Parcelable.Creator<Movie> CREATOR
            = new Parcelable.Creator<Movie>() {
        public Movie createFromParcel(Parcel in) {
            return new Movie(in);
        }

        public Movie[] newArray(int size) {
            return new Movie[size];
        }
    };

}
