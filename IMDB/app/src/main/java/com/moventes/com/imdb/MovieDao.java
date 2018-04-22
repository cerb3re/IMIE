package com.moventes.com.imdb;

import android.arch.persistence.room.Dao;
import android.arch.persistence.room.Delete;
import android.arch.persistence.room.Insert;
import android.arch.persistence.room.OnConflictStrategy;
import android.arch.persistence.room.Query;

import java.util.List;

@Dao
public interface MovieDao {

    @Query("SELECT * FROM movies")
    List<Movie> getMovies();

    @Query("SELECT * FROM movies WHERE id = :id")
    Movie getMovieById(String id);

    @Query("SELECT * FROM movies WHERE title LIKE :title LIMIT 10")
    List<Movie> getMoviesByTitle(String title);

    @Insert(onConflict = OnConflictStrategy.REPLACE)
    void addMovie(Movie movie);

    @Delete
    void removeMovie(Movie movie);

}
